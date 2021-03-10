window.addEventListener("load", () => {
  var navbar_trigger = document.getElementById('navbar_trigger');
  var navbar = document.getElementById('navbar');
  
  navbar_trigger.addEventListener("click", () => {
    if(navbar.classList.contains("hidden")){
      navbar.classList.remove("hidden")
      navbar.classList.add("flex")
    }else{
      navbar.classList.remove("flex")
      navbar.classList.add("hidden")
    }
  })
})
