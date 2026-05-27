document.addEventListener("DOMContentLoaded", function() {
    const slider = document.getElementById('slider');
    
    if (slider) { 
        let indiceActual = 0;
        const totalSlides = document.querySelectorAll('.slide').length; 

        function rotarFondo() {
            indiceActual++;
            
            slider.style.transition = "transform 1s ease-in-out";
            let desplazamiento = -(indiceActual * 100);
            slider.style.transform = `translateX(${desplazamiento}%)`;

            if (indiceActual >= totalSlides - 1) {
                setTimeout(function() {
                    slider.style.transition = "none";
                    indiceActual = 0;
                    slider.style.transform = "translateX(0%)";
                }, 1000); 
            }
        }
        setInterval(rotarFondo, 4000);
    }






    const btnAplicar = document.querySelector('.btn-aplicar');
    const selectOrdenar = document.querySelector('.ordenar select');
    const contenedorItems = document.querySelector('.items-flex');

    if (btnAplicar) {
        btnAplicar.addEventListener('click', aplicarFiltros);
    }

    if (selectOrdenar) {
        selectOrdenar.addEventListener('change', aplicarFiltros);
    }

    function aplicarFiltros() {
        const items = document.querySelectorAll('.item-card');
        const grupos = document.querySelectorAll('.grupo-filtro');

        const catsSeleccionadas = Array.from(grupos[0].querySelectorAll('input[type="checkbox"]:checked'))
                                        .map(cb => cb.parentElement.textContent.trim().toLowerCase());
        
        const rarezasSeleccionadas = Array.from(grupos[1].querySelectorAll('input[type="checkbox"]:checked'))
                                        .map(cb => cb.parentElement.textContent.trim().toLowerCase());

        items.forEach(item => {
            const catItem = item.getAttribute('data-categoria'); 
            const rarItem = item.getAttribute('data-rareza');   
            
            const cumpleCat = (catsSeleccionadas.length === 0 || catsSeleccionadas.includes(catItem));
            const cumpleRareza = (rarezasSeleccionadas.length === 0 || rarezasSeleccionadas.includes(rarItem));
            
            item.style.display = (cumpleCat && cumpleRareza) ? "flex" : "none";
        });

        const itemsVisibles = Array.from(document.querySelectorAll('.item-card')).filter(i => i.style.display !== 'none');
        const criterio = selectOrdenar.value;
        
        const ordenRarezas = {
            "común": 0,
            "inusual": 1,
            "raro": 2,
            "muy raro": 3,
            "importado": 4,
            "exótico": 5,
            "mercado negro": 6
        };

        itemsVisibles.sort((a, b) => {
            if (criterio === 'Alfabético') {
                return a.getAttribute('data-nombre').localeCompare(b.getAttribute('data-nombre'));
            }
            if (criterio === 'Rareza') {
                const valA = ordenRarezas[a.getAttribute('data-rareza')] || 0;
                const valB = ordenRarezas[b.getAttribute('data-rareza')] || 0;
                return valB - valA; 
            }
            return 0;
        });

        itemsVisibles.forEach(item => contenedorItems.appendChild(item));
    }






    let carrito = JSON.parse(localStorage.getItem('carritoRLO')) || [];
    
    const btnCarritoWrapper = document.getElementById('icono-carrito-wrapper');
    const panelCarrito = document.getElementById('panel-carrito');
    const listaCarrito = document.getElementById('lista-carrito');
    const contadorCarrito = document.getElementById('contador-carrito');
    const totalPrecio = document.getElementById('total-precio');
    const btnPagar = document.getElementById('btn-pagar');
    const modalLogin = document.getElementById('modal-login');
    const btnCerrarModal = document.querySelector('.cerrar-modal');

    if (listaCarrito) actualizarCarrito();

    if (btnCarritoWrapper) {
        btnCarritoWrapper.addEventListener('click', (event) => {
            event.stopPropagation();
            panelCarrito.style.display = (panelCarrito.style.display === 'flex') ? 'none' : 'flex';
        });
    }

    if (panelCarrito) {
        panelCarrito.addEventListener('click', (event) => { event.stopPropagation(); });
        document.addEventListener('click', () => { panelCarrito.style.display = 'none'; });
    }

    if (btnCerrarModal) {
        btnCerrarModal.addEventListener('click', () => { modalLogin.style.display = 'none'; });
    }




    if (btnPagar) {
        btnPagar.addEventListener('click', () => {
            if (carrito.length === 0) {
                mostrarModalMensaje("Carrito vacío", "Añade algún objeto antes de finalizar la compra.", "error");
                panelCarrito.style.display = 'none';
                return;
            }
            if (!usuarioLogueado) { 
                modalLogin.style.display = 'flex';
                panelCarrito.style.display = 'none';
            } else {
                fetch('procesar_compra.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ carrito: carrito }) 
                })
                .then(response => response.json())
                .then(data => {
                    panelCarrito.style.display = 'none'; 
                    if(data.status === 'success') {
                        carrito = []; 
                        localStorage.removeItem('carritoRLO');
                        actualizarCarrito();
                        mostrarModalMensaje("¡Compra Exitosa!", "Los objetos ya están en tu inventario.", "exito", true);
                    } else {
                        mostrarModalMensaje("Error en la compra", data.message, "error");
                    }
                })
                .catch(error => {
                    console.error("Error al procesar la compra:", error);
                    mostrarModalMensaje("Error de conexión", "No se pudo conectar con el servidor.", "error");
                });
            }
        });
    }


    const botonesCompra = document.querySelectorAll('.btn-comprar, .btn-mini');
    botonesCompra.forEach(boton => {
        boton.addEventListener('click', function() {
            const card = this.closest('.card-destacada, .card-diaria');
            let nombre, precioStr, imgSrc;
            
            const objetoId = parseInt(this.getAttribute('data-id'));

            if (card.classList.contains('card-destacada')) {
                nombre = card.querySelector('.nombre-item').textContent;
                precioStr = card.querySelector('.precio').textContent;
                imgSrc = card.querySelector('.imagen-destacada img').src;
            } else {
                nombre = card.querySelector('h4').textContent;
                precioStr = card.querySelector('.precio').textContent;
                imgSrc = card.querySelector('.img-diaria img').src;
            }
            const precio = parseInt(precioStr.replace(/\D/g, ''));
            
            const yaEnCarrito = carrito.find(item => item.id === objetoId);
            if (yaEnCarrito) {
                mostrarModalMensaje("Objeto repetido", "Este objeto ya se encuentra en tu carrito.", "error");
                return;
            }

            carrito.push({ id: objetoId, nombre, precio, imgSrc });
            actualizarCarrito();
            panelCarrito.style.display = 'flex';
        });
    });




    function actualizarCarrito() {
        if (!listaCarrito) return;
        listaCarrito.innerHTML = '';
        let total = 0;
        if (carrito.length === 0) {
            listaCarrito.innerHTML = '<p style="text-align: center; color: #777;">El carrito está vacío</p>';
        } else {
            carrito.forEach((item, index) => {
                total += item.precio;
                const div = document.createElement('div');
                div.classList.add('item-en-carrito');
                div.innerHTML = `<img src="${item.imgSrc}" alt="${item.nombre}"><div class="item-en-carrito-info"><p>${item.nombre}</p><span>${item.precio} cr</span></div><button class="btn-eliminar" data-index="${index}"><i class="fa-solid fa-trash"></i></button>`;
                listaCarrito.appendChild(div);
            });
        }
        if(contadorCarrito) contadorCarrito.textContent = carrito.length;
        if(totalPrecio) totalPrecio.textContent = total + ' cr';
        localStorage.setItem('carritoRLO', JSON.stringify(carrito));
        document.querySelectorAll('.btn-eliminar').forEach(boton => {
            boton.addEventListener('click', function() {
                carrito.splice(this.getAttribute('data-index'), 1);
                actualizarCarrito();
            });
        });
    }

    const botonesTexto = document.querySelectorAll('.leer-mas, .info a');
    botonesTexto.forEach(boton => {
        boton.addEventListener('click', function(e) {
            e.preventDefault();
            const textoExtra = this.previousElementSibling.querySelector('.texto-extra');
            if (textoExtra) {
                textoExtra.style.display = (textoExtra.style.display === "none") ? "inline" : "none";
                this.textContent = (textoExtra.style.display === "none") ? "Leer más" : "Leer menos";
            }
        });
    });




    const btnCargarMas = document.getElementById('btn-cargar-mas');
    const btnMostrarMenos = document.getElementById('btn-mostrar-menos');
    const filaExtra = document.querySelector('.fila-extra');

    if (btnCargarMas) {
        btnCargarMas.addEventListener('click', function() {
            if (filaExtra) filaExtra.style.display = "flex";
            this.style.display = "none";
            if (btnMostrarMenos) btnMostrarMenos.style.display = "inline-block";
        });
    }

    if (btnMostrarMenos) {
        btnMostrarMenos.addEventListener('click', function() {
            if (filaExtra) filaExtra.style.display = "none";
            this.style.display = "none";
            if (btnCargarMas) btnCargarMas.style.display = "inline-block";
        });
    }

function mostrarModalMensaje(titulo, mensaje, tipo, recargarAlCerrar = false) {
    const modal = document.getElementById('modal-mensaje');
    const icono = document.getElementById('icono-mensaje');
    const tituloEl = document.getElementById('titulo-mensaje');
    const textoEl = document.getElementById('texto-mensaje');
    const btnCerrar = document.getElementById('btn-cerrar-mensaje');
    const btnX = document.querySelector('.cerrar-modal-mensaje');

    tituloEl.textContent = titulo;
    textoEl.textContent = mensaje;

    if (tipo === 'exito') {
        icono.className = 'fa-solid fa-circle-check';
        icono.style.color = '#2ed573';
        btnCerrar.style.backgroundColor = '#2ed573';
        btnCerrar.style.color = 'black';
    } else {
        icono.className = 'fa-solid fa-circle-xmark';
        icono.style.color = '#ff4757';
        btnCerrar.style.backgroundColor = '#ff4757';
        btnCerrar.style.color = 'white';
    }

    modal.style.display = 'flex';

    const cerrar = () => {
        modal.style.display = 'none';
        if (recargarAlCerrar) {
            location.reload();
        }
    };

    btnCerrar.onclick = cerrar;
    btnX.onclick = cerrar;
}
});