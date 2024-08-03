// scroll down navbar in mobile 

navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    navbar.classList.remove('active');
    profile.classList.remove('active');
}
//transitin
let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
    profile.classList.toggle('active');
    navbar.classList.remove('active');
    

}

//let navbar =document.querySelector('.header .flex .navbar');
document.querySelector('#menu-btn').onclick = () =>{
   
    navbar.classList.toggle('active');
    profile.classList.remove('active');

    
}
window.onscroll = () =>{
    navbar.classList.remove('active');
    profile.classList.remove('active');
}

document.querySelectorAll('input[type="number"]').forEach(input =>{
    input.oninput = () =>{
        if(input.Value.length > input.maxLength) input.value = input.value.slice
        (0, input.maxLength);
    }
});


function toggleAnswer(element) {
    const answer = element.nextElementSibling;
    if (answer.style.display === "block") {
        answer.style.display = "none";
    } else {
        answer.style.display = "block";
    }
}
