
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
const validEmail = (email) => {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    const isValid = emailPattern.test(email);
    const message = "Please enter a valid email address. Example: user@example.com";
    return { isValid, message }
}
const validUsername = (us) => {
    const isValid = /^[A-Za-z]{3,}$/.test(us);
    console.log(isValid, us)
    const message = "Username need to be more than 3 letters and not included number and special character";
    return { isValid, message }
}

const validPassword = (conf, pass) => {
    console.log(conf ==pass)
    const isMatch = conf == pass;
    if (!isMatch) {
        return {
            message: "Password is invalid",
            isValid: isMatch
        }

    }
    const strongPasswordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    const isValid = strongPasswordPattern.test(pass);
    return {
        isValid,
        message: "Password contains 8 letters (1 upper and 1 lower) with at least 1 special character",
    }
}


