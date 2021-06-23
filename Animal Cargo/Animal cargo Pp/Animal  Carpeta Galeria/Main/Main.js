var imagenes = ['Img/img1.jpg','Img/img2.png','Img/img3.jpg'],
  cont = 0;



  function animado (contenedor){
    contenedor.addEventListener('click', e =>{
      let atras = contenedor.querySelector('.atras'),
        adelate = contenedor.querySelector('.adelante'),
          Img = contenedor.querySelector('Img'),
          tgt = e.target; 



          if (tgt == atras) {
            if (cont > 0) {
              Img.src = imagenes [cont - 1];
              cont --;
              
            } else {
              Img.src = imagenes[imagenes.length - 1 ];
              cont = imagenes.length - 1; 
            }
            
          } else if(tgt == adelate){
            
            if (cont < imagenes.length - 1) {
              Img.src = imagenes [cont + 1];
              cont ++;
              
            } else {
              Img.src = imagenes[0];
              cont = 0; 
            }


            
          }


    });
  }

  document.addEventListener("DOMContentLoaded", () => { 
    let contenedor = document.querySelector('.contenedor');

  animado(contenedor);

  });