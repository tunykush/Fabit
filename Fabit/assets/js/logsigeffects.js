
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}


function getRandomFloat(min, max) {
    return (Math.random() * (max - min) + min).toFixed(2);
}


const fallingImages = document.querySelectorAll('.falling-image');


fallingImages.forEach(image => {

    const randomLeft = getRandomInt(0, 90); 


    const randomDelay = getRandomFloat(0, 5); 


    const randomDuration = getRandomFloat(8, 20); 

    
    const randomRotation = getRandomInt(-360, 360); 

    
    const randomScale = getRandomFloat(0.5, 1.5);

    
    const randomOpacity = getRandomFloat(0.3, 1);

    
    image.style.left = `${randomLeft}%`;

    
    image.style.animationDelay = `${randomDelay}s`;
    image.style.animationDuration = `${randomDuration}s`;

    
    image.style.transform = `rotate(${randomRotation}deg) scale(${randomScale})`;

    
    image.style.opacity = randomOpacity;
});
