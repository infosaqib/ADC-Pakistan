<!-------- Stylesheets  -------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../dist/output.css">
<link rel="stylesheet" href="../stylesheets/style.css">
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<style>
#headerMenu.show {
    opacity: 1;
    display: flex;
    z-index: 10;
}

@media (max-width: 800px) {
    #headerMenu {
        opacity: 0;
        display: none
    }
}

@media (min-width> 800px) {
    #menubar {
        opacity: 0;
        display: none
    }
}
#overlay {
    display: none;
    transition: all ease 1s;
    position: absolute;
    top: 4em;
    left: 0;
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0, .5);
    z-index: 8;
}

#overlay.show {
    display: block;
    opacity: 1;
  
}
</style>
</head> 
<body>

<!-- header content can go here -->
<header class="py-2 px-10 w-full bg-gray-900 flex flex-row justify-between z-10 breadcrumbs">
    
    <div class="flex flex-row items-center justify-center">
<a href="https://armydogcenterpk.com/"><img src="https://armydogcenterpk.com/images/logo-armydog.webp" alt="error" class="size-14 bg-blue p-1 rounded-full"></a>   
<h1 class="font-semibold text-indigo-500 px-2 md:hidden">ARMY DOG CENTER PAKISTAN</h1>
</div>


<div id="headerMenu"
class="md:flex flex-col  md:flex-row justify-center items-start md:items-center md:gap-x-6 gap-y-8 md:gap-y-0 absolute top-16 right-0 md:static md:opacity-100">
<ul
class="text-xl w-full lg:text-lg flex flex-col md:flex-row bg-gray-900 md:bg-transparent justify-start md:justify-center items-start md:items-center gap-x-4 gap-y-5 md:gap-y-0 py-6 sm:py-10 md:py-0 px-12 sm:px-20 md:px-0 ">
<li class=" w-full"> <a class="flex w-full p-3 text-indigo-500 tracking-wide font-semibold hover:bg-gray-800" href="https://armydogcenterpk.com/">
        Home</a>
</li>
<li class=" w-full"> <a class="flex w-full p-3 text-indigo-500  tracking-wide font-semibold hover:bg-gray-800"
        href="https://about.armydogcenterpk.com/">
        About us</a>
</li>
<li class=" w-full"> <a class="flex w-full p-3 text-indigo-500   tracking-wide font-semibold hover:bg-gray-800"
        href="https://blog.armydogcenterpk.com/">
        Blog</a></li>
        <li class="group relative w-full">
    <a href="https://services.armydogcenterpk.com/" id="dropdownNavbarLink"
        class="flex w-full items-center justify-between w-full p-3 text-indigo-500 font-semibold tracking-wide rounded hover:bg-gray-800 md:border-0 md:p-0 md:w-auto ">
        Services
        <svg class="w-2.5 h-2.5 ms-2.5 hidden md:block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
        </svg>
    </a>
    <!-- Dropdown menu -->
    <div id="dropdownNavbar" class="hidden md:group-hover:block absolute top-9 z-[99] font-normal bg-gray-800 divide-y divide-gray-800 rounded-lg shadow w-[15em]">
        <ul class="py-2 text-sm text-indigo-500" aria-labelledby="dropdownNavbarLink">
            <li>
       
               <ul class="pl-4 text-xl">
  <li><a href="https://services.armydogcenterpk.com/hyderabad.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER HYDERABAD | 03008977885</a></li>
                  <li><a href="https://services.armydogcenterpk.com/hyderabad-cantt.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER HYDERABAD CANTT| 03332874135</a></li>
       <li><a href="https://services.armydogcenterpk.com/karachi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER KARACHI | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/malir-cantt-karachi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MALIR-CANTT-KARACHI | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/hub-chowki.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER HUB-CHOWKI | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/thatta.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER THATTA | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/sajawal.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER SAJAWAL | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/badin.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER BADIN | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/badin-cantt.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER BADIN-CANTT | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/mirpurkhas.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MIRPURKHAS | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/umerkote.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER UMERKOTE | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/islamkote.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER ISLAMKOTE | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/mithi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MITHI | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/shahdadpur.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER SHAHDADPUR | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/sanghar.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER SANGHAR | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/nawabshah.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER NAWABSHAH | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/moro.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MORO | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/keti-bandar.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER KETI BANDAR | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/dadu.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER DADU | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/larkana.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER LARKANA | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/wahipandi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER WAHIPANDI | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/digbala.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER DIGBALA | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/shikarpur.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER SHIKARPUR | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/turbat.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER TURBAT | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/quetta.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER QUETTA | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/lasbila.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER LASBILA | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/gwadar.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER GWADAR | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mussa-khel.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MUSSA KHEL | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/chaman.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER CHAMAN | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/dera-bughti.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER DERA BUGHTI | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/tharparkar.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER THARPARKAR | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/chhor-cantt.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER CHHOR CANTT | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/port-qasim-karachi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER PORT QASIM KARACHI | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/chuhar-jamali.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER CHUHAR JAMALI | 03008977885</a></li>


</ul>

            </li>
           
        </ul>
    </div>
</li>
 <ul class="pl-4 md:hidden text-indigo-500 text-xl z-10">
         <li><a href="https://services.armydogcenterpk.com/hyderabad.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER HYDERABAD | 03008977885</a></li>
                  <li><a href="https://services.armydogcenterpk.com/hyderabad-cantt.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER HYDERABAD CANTT| 03332874135</a></li>
       <li><a href="https://services.armydogcenterpk.com/karachi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER KARACHI | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/malir-cantt-karachi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MALIR-CANTT-KARACHI | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/hub-chowki.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER HUB-CHOWKI | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/thatta.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER THATTA | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/sajawal.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER SAJAWAL | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/badin.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER BADIN | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/badin-cantt.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER BADIN-CANTT | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/mirpurkhas.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MIRPURKHAS | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/umerkote.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER UMERKOTE | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/islamkote.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER ISLAMKOTE | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/mithi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MITHI | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/shahdadpur.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER SHAHDADPUR | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/sanghar.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER SANGHAR | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/nawabshah.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER NAWABSHAH | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/moro.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MORO | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/keti-bandar.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER KETI BANDAR | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/dadu.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER DADU | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/larkana.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER LARKANA | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/wahipandi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER WAHIPANDI | 03332874135</a></li>
    <li><a href="https://services.armydogcenterpk.com/digbala.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER DIGBALA | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/shikarpur.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER SHIKARPUR | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/turbat.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER TURBAT | 03008977885</a></li>
    <li><a href="https://services.armydogcenterpk.com/quetta.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER QUETTA | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/lasbila.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER LASBILA | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/gwadar.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER GWADAR | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mussa-khel.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER MUSSA KHEL | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/chaman.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER CHAMAN | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/dera-bughti.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER DERA BUGHTI | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/tharparkar.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER THARPARKAR | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/chhor-cantt.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER CHHOR CANTT | 03008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/port-qasim-karachi.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER PORT QASIM KARACHI | 03332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/chuhar-jamali.php" class="block px-4 py-2 hover:bg-gray-800 ">ARMY DOG CENTER CHUHAR JAMALI | 03008977885</a></li>
                </ul>
  <li>
<li class=" w-full"> <a class="flex w-full p-3 text-indigo-500 tracking-wide font-semibold hover:bg-gray-800"
        href="https://contact.armydogcenterpk.com/">
        Contact
        us</a></li>

</ul>
</div>
<button id="menubar" class="md:hidden button-one" id="button-one" aria-controls="primary-navigation"
aria-expanded="false">
<svg onclick="return showMenu()" class="size-6 cursor-pointer " xmlns="http://www.w3.org/2000/svg"
width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="1.5"
stroke-linecap="round" stroke-linejoin="round">
<line x1="3" y1="12" x2="21" y2="12"></line>
<line x1="3" y1="6" x2="21" y2="6"></line>
<line x1="3" y1="18" x2="21" y2="18"></line>
</svg>
</button>
</header>

   <!-- OVERLAY -->
   <div id="overlay" onclick="return hideMenu()"></div>

 <!-- Call -->
 <a class="fixed z-[3] bottom-20 size-12 p-[7px] left-4 bg-green-400 rounded-lg flex justify-center items-center"
    href="tel:+923001690800">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class=" size-12 bi bi-telephone-fill"
        viewBox="0 0 16 16">
        <path fill-rule="evenodd"
            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
    </svg>
</a>
<!-- Whatsapp -->

<a class="fixed z-[3] bottom-4 left-4 size-12"
    href="https://wa.me/+923003006220">
    <svg class="wow flash bg-[#1dcf1d] hover:bg-[#09b709] rounded-xl" data-wow-delay="5s" data-wow-duration="2s"
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32"
        style="visibility: visible; animation-duration: 2s; animation-delay: 5s; animation-name: flash;">
        <path
            d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z"
            fill-rule="evenodd" fill="#fff"></path>
    </svg>
</a>
<!-- SCRIPTS -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

<script src="https://cdn.tailwindcss.com"></script>
<script>
    const overlay = document.getElementById('overlay');
const Menu = document.getElementById('headerMenu');
console.log(Menu)
    function showMenu() {
        overlay.classList.toggle('show');
        Menu.classList.toggle('show');

}
function hideMenu() {
    overlay.classList.remove('show');
    Menu.classList.remove('show');


    }
</script>
</body>
</html>