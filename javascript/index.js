const elementos = document.querySelectorAll('[data-anima]');
const animacaoClass = 'animacao';

function animaScroll(){
	const topoPaginaJanela = window.pageYOffset + ((window.innerHeight*3)/4); // 3/4 da janela
	elementos.forEach(function(elemento){
		if(topoPaginaJanela > elemento.offsetTop){
			elemento.classList.add(animacaoClass)
		}
	})
}

if(elementos.length){
	window.addEventListener('scroll',function(){
		animaScroll();
	})
}