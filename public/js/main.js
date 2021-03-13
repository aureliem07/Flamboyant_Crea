window.addEventListener("load", () => {
  var navbar_menu = document.getElementById('navbar_menu');
  var navbar_menu_list = document.getElementById('navbar_menu_list');
  var navbar_compte = document.getElementById('navbar_compte');
  var navbar_compte_list = document.getElementById('navbar_compte_list');
  var navbar_panier = document.getElementById('navbar_panier');

  navbar_menu.addEventListener("click", () => {
    if(navbar_menu_list.classList.contains("hidden")){
      navbar_menu_list.classList.remove("hidden")
      navbar_menu_list.classList.add("flex")
      navbar_compte.classList.add("hidden")
      navbar_panier.classList.add("hidden")
    }else{
      navbar_menu_list.classList.remove("flex")
      navbar_menu_list.classList.add("hidden")
      navbar_compte.classList.remove("hidden")
      navbar_panier.classList.remove("hidden")
    }
  })

  navbar_compte.addEventListener("click", () => {
    if(navbar_compte_list.classList.contains("hidden")){
      navbar_compte_list.classList.remove("hidden")
      navbar_compte_list.classList.add("flex")
      navbar_menu.classList.add("hidden")
      navbar_panier.classList.add("hidden")
    }else{
      navbar_compte_list.classList.remove("flex")
      navbar_compte_list.classList.add("hidden")
      navbar_menu.classList.remove("hidden")
      navbar_panier.classList.remove("hidden")
    }
  })
})
