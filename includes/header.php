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

<!--SINDH CITIES-->
<li><a href="https://services.armydogcenterpk.com/karachi-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KARACHI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/malir.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MALIR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/dhabeji.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DHABEJI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/gharo.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GHARO | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/makli.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MAKLI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/thatta-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER THATTA | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/jhampir.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JHAMPIR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/mirpur-sakro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MIRPUR SAKRO | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/garho.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GARHO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/baghan.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER BAGHAN | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/keti-bandar-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KETI BANDAR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/labor-colony.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER LABOR COLONY | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/sujawal.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SUJAWAL | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/chuhar-jamali-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER CHUHAR JAMALI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/golarchi.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GOLARCHI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/jati.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JATI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/badin-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER BADIN | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/hyderabad-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER HYDERABAD | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/badin-cantt-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER BADIN CANTT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/hyderabad-cantt-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER HYDERABAD CANTT | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/diplo.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DIPLO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/tharparkar-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER THARPARKAR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mithi-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MITHI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/islamkot-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER ISLAMKOT | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/nagarparkar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAGARPARKAR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/naukot.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAUKOT | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/jhuddo.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JHUDDO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/digri.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DIGRI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mirpur-khas.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MIRPUR KHAS | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/kunri.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KUNRI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/umarkot.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER UMARKOT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/chhor-cantt-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER CHHOR CANTT | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/naya-chhor.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAYA CHHOR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/tando-allahyar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER TANDO ALLAHYAR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/tando-jam.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER TANDO JAM | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/kotri.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KOTRI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/jamshoro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JAMSHORO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/sann.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SANN | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/matiari.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MATIARI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/hala.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER HALA | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/shahdadpur-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SHAHDADPUR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/sanghar-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SANGHAR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/khipro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KHIPRO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/shahpur-chakar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SHAHPUR CHAKAR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/nawabshah-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAWABSHAH | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/sakrand.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SAKRAND | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/daulatpur.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DAULATPUR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/moro-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MORO | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/naushahro-feroze.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAUSHAHRO FERROZE | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/bhiria-city.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER BHIRIA CITY | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/kandiaro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KANDIARO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/ranipur.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER RANIPUR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/gambat.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GAMBAT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/khairpur.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KHAIRPUR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/dadu-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DADU | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/gohi.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GOHI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/wahipandi-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER WAHIPANDI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/digbala-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DIGBALA | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/sehwan.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SEHWAN | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/khairpur-nathan.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KHAIRPUR NATHAN | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mehar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MEHAR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/nasirabad.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NASIRABAD | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/qambar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER QAMBAR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/larkana-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER LARKANA | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/shahdadkot.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SHAHDADKOT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/rato-dero.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER RATO DERO | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/naudero.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAUDERO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/shikarpur-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SHIKARPUR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/jacobabad.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JACOBABAD | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/sukkur.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SUKKUR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/kandkot.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KANDKOT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/kashmore.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KASHMORE | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/rohri.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER ROHRI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/pano-aqil.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER PANO AQIL | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/pano-aqil-cantt.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER PANO AQIL CANTT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/ghotki.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GHOTKI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mirpur-mathelo.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MIRPUR MATHELO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/daharki.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DAHARKI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/ubauro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER UBAURO | O3008977885</a></li>

<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/pakistan.php">ARMY DOG CENTER PAKISTAN | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/index-II.php">ARMY DOG CENTER | 03332874135</a></li>

<!--PUNJAB CITIES-->
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/islamabad.php">ARMY DOG CENTER ISLAMABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/rawalpindi.php">ARMY DOG CENTER RAWALPINDI | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mandra.php">ARMY DOG CENTER MANDRA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/gujar-khan.php">ARMY DOG CENTER GUJAR KHAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kallar-syedan.php">ARMY DOG CENTER KALLAR SYEDAN | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sohawa.php">ARMY DOG CENTER SOHAWA | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/dina.php">ARMY DOG CENTER DINA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/rohtas-fort.php">ARMY DOG CENTER ROHTAS FORT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mangla.php">ARMY DOG CENTER MANGLA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/jhelum.php">ARMY DOG CENTER JHELUM | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kharian.php">ARMY DOG CENTER KHARIAN | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kharian-cantt.php">ARMY DOG CENTER KHARIAN CANTT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/lalamusa.php">ARMY DOG CENTER LALAMUSA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/deona-mandi.php">ARMY DOG CENTER DEONA MANDI | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/gujrat.php">ARMY DOG CENTER GUJRAT | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/shadiwal.php">ARMY DOG CENTER SHADIWAL | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/wazirabad.php">ARMY DOG CENTER WAZIRABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/rahwali-cantt.php">ARMY DOG CENTER RAHWALI CANTT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/gujranwala.php">ARMY DOG CENTER GUJRANWALA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kala-shah-kaku.php">ARMY DOG CENTER KALA SHAH KAKU | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/lahore.php">ARMY DOG CENTER LAHORE | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kasur.php">ARMY DOG CENTER KASUR | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sheikhupura.php">ARMY DOG CENTER SHEIKHUPURA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/hafizabad.php">ARMY DOG CENTER HAFIZABAD | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mananwala.php">ARMY DOG CENTER MANANWALA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/shahkot.php">ARMY DOG CENTER SHAHKOT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sangla-hill.php">ARMY DOG CENTER SANGLA HILL | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mandi-bahauddin.php">ARMY DOG CENTER MANDI BAHAUDDIN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/okara.php">ARMY DOG CENTER OKARA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sahiwal.php">ARMY DOG CENTER SAHIWAL | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/haroonabad.php">ARMY DOG CENTER HAROONABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/minchnabad.php">ARMY DOG CENTER MINCHNABAD | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/faisalabad.php">ARMY DOG CENTER FAISALABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/chiniot.php">ARMY DOG CENTER CHINIOT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sargodha.php">ARMY DOG CENTER SARGODHA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/jhang.php">ARMY DOG CENTER JHANG | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/shorkot.php">ARMY DOG CENTER SHORKOT | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/dera-ismail-khan.php">ARMY DOG CENTER DERA ISMAIL KHAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mainwali.php">ARMY DOG CENTER MAINWALI | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/layyah.php">ARMY DOG CENTER LAYYAH | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/multan.php">ARMY DOG CENTER MULTAN | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/dera-ghazi-khan.php">ARMY DOG CENTER DERA GHAZI KHAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/bahawalpur.php">ARMY DOG CENTER BAHAWALPUR | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/rahim-yar-khan.php">ARMY DOG CENTER RAHIM YAR KHAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sadqabad.php">ARMY DOG CENTER SADQABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/ubauro-II.php">ARMY DOG CENTER UBAURO | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/daharki-II.php">ARMY DOG CENTER DAHARKI | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mirpur-mathelo-II.php">ARMY DOG CENTER MIRPUR MATHELO | 03332874135</a></li>

<!--KPK cities-->
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/pakistan-II.php">ARMY DOG CENTER PAKISTAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/army-dog-center.php">ARMY DOG CENTER | 03008977885</a></li>

  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/peshawar.php">ARMY DOG CENTER PESHAWAR | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/abbottabad.php">ARMY DOG CENTER ABBOTTABAD | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mardan.php">ARMY DOG CENTER MARDAN | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/swabi.php">ARMY DOG CENTER SWABI | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/nowshera.php">ARMY DOG CENTER NOWSHERA | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kohat.php">ARMY DOG CENTER KOHAT | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/haripur.php">ARMY DOG CENTER HARIPUR | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mansehra.php">ARMY DOG CENTER MANSEHRA | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/bannu.php">ARMY DOG CENTER BANNU | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/dera-ismail-khan.php">ARMY DOG CENTER DERA ISMAIL KHAN | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/charsadda.php">ARMY DOG CENTER CHARSADDA | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/swat.php">ARMY DOG CENTER SWAT | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/malakand.php">ARMY DOG CENTER MALAKAND | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mingora.php">ARMY DOG CENTER MINGORA | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/hangu.php">ARMY DOG CENTER HANGU | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/karak.php">ARMY DOG CENTER KARAK | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/lakki-marwat.php">ARMY DOG CENTER LAKKI MARWAT | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/chitral.php">ARMY DOG CENTER CHITRAL | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/batkhela.php">ARMY DOG CENTER BATKHELA | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/upper-dir.php">ARMY DOG CENTER UPPER DIR | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/lower-dir.php">ARMY DOG CENTER LOWER DIR | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/haripur-hazara.php">ARMY DOG CENTER HARIPUR HAZARA | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/khyber.php">ARMY DOG CENTER KHYBER | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/frontier-region-kohat.php">ARMY DOG CENTER FRONTIER REGION KOHAT | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/murree.php">ARMY DOG CENTER MURREE | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kashmir.php">ARMY DOG CENTER KASHMIR | 03008977885</a></li>


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

<!--SINDH CITIES-->
<li><a href="https://services.armydogcenterpk.com/karachi-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KARACHI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/malir.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MALIR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/dhabeji.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DHABEJI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/gharo.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GHARO | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/makli.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MAKLI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/thatta-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER THATTA | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/jhampir.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JHAMPIR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/mirpur-sakro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MIRPUR SAKRO | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/garho.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GARHO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/baghan.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER BAGHAN | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/keti-bandar-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KETI BANDAR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/labor-colony.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER LABOR COLONY | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/sujawal.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SUJAWAL | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/chuhar-jamali-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER CHUHAR JAMALI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/golarchi.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GOLARCHI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/jati.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JATI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/badin-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER BADIN | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/hyderabad-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER HYDERABAD | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/badin-cantt-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER BADIN CANTT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/hyderabad-cantt-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER HYDERABAD CANTT | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/diplo.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DIPLO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/tharparkar-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER THARPARKAR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mithi-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MITHI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/islamkot-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER ISLAMKOT | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/nagarparkar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAGARPARKAR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/naukot.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAUKOT | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/jhuddo.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JHUDDO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/digri.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DIGRI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mirpur-khas.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MIRPUR KHAS | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/kunri.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KUNRI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/umarkot.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER UMARKOT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/chhor-cantt-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER CHHOR CANTT | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/naya-chhor.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAYA CHHOR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/tando-allahyar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER TANDO ALLAHYAR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/tando-jam.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER TANDO JAM | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/kotri.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KOTRI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/jamshoro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JAMSHORO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/sann.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SANN | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/matiari.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MATIARI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/hala.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER HALA | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/shahdadpur-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SHAHDADPUR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/sanghar-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SANGHAR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/khipro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KHIPRO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/shahpur-chakar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SHAHPUR CHAKAR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/nawabshah-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAWABSHAH | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/sakrand.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SAKRAND | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/daulatpur.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DAULATPUR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/moro-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MORO | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/naushahro-feroze.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAUSHAHRO FERROZE | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/bhiria-city.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER BHIRIA CITY | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/kandiaro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KANDIARO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/ranipur.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER RANIPUR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/gambat.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GAMBAT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/khairpur.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KHAIRPUR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/dadu-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DADU | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/gohi.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GOHI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/wahipandi-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER WAHIPANDI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/digbala-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DIGBALA | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/sehwan.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SEHWAN | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/khairpur-nathan.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KHAIRPUR NATHAN | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mehar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MEHAR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/nasirabad.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NASIRABAD | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/qambar.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER QAMBAR | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/larkana-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER LARKANA | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/shahdadkot.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SHAHDADKOT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/rato-dero.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER RATO DERO | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/naudero.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER NAUDERO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/shikarpur-II.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SHIKARPUR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/jacobabad.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER JACOBABAD | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/sukkur.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER SUKKUR | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/kandkot.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KANDKOT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/kashmore.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER KASHMORE | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/rohri.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER ROHRI | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/pano-aqil.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER PANO AQIL | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/pano-aqil-cantt.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER PANO AQIL CANTT | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/ghotki.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER GHOTKI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/mirpur-mathelo.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER MIRPUR MATHELO | O3008977885</a></li>
<li><a href="https://services.armydogcenterpk.com/daharki.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER DAHARKI | O3332874135</a></li>
<li><a href="https://services.armydogcenterpk.com/ubauro.php" class="block px-4 py-2 hover:bg-gray-800">ARMY DOG CENTER UBAURO | O3008977885</a></li>

<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/pakistan.php">ARMY DOG CENTER PAKISTAN | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/index-II.php">ARMY DOG CENTER | 03332874135</a></li>

<!--PUNJAB CITIES-->
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/islamabad.php">ARMY DOG CENTER ISLAMABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/rawalpindi.php">ARMY DOG CENTER RAWALPINDI | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mandra.php">ARMY DOG CENTER MANDRA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/gujar-khan.php">ARMY DOG CENTER GUJAR KHAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kallar-syedan.php">ARMY DOG CENTER KALLAR SYEDAN | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sohawa.php">ARMY DOG CENTER SOHAWA | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/dina.php">ARMY DOG CENTER DINA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/rohtas-fort.php">ARMY DOG CENTER ROHTAS FORT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mangla.php">ARMY DOG CENTER MANGLA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/jhelum.php">ARMY DOG CENTER JHELUM | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kharian.php">ARMY DOG CENTER KHARIAN | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kharian-cantt.php">ARMY DOG CENTER KHARIAN CANTT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/lalamusa.php">ARMY DOG CENTER LALAMUSA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/deona-mandi.php">ARMY DOG CENTER DEONA MANDI | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/gujrat.php">ARMY DOG CENTER GUJRAT | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/shadiwal.php">ARMY DOG CENTER SHADIWAL | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/wazirabad.php">ARMY DOG CENTER WAZIRABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/rahwali-cantt.php">ARMY DOG CENTER RAHWALI CANTT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/gujranwala.php">ARMY DOG CENTER GUJRANWALA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kala-shah-kaku.php">ARMY DOG CENTER KALA SHAH KAKU | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/lahore.php">ARMY DOG CENTER LAHORE | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kasur.php">ARMY DOG CENTER KASUR | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sheikhupura.php">ARMY DOG CENTER SHEIKHUPURA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/hafizabad.php">ARMY DOG CENTER HAFIZABAD | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mananwala.php">ARMY DOG CENTER MANANWALA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/shahkot.php">ARMY DOG CENTER SHAHKOT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sangla-hill.php">ARMY DOG CENTER SANGLA HILL | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mandi-bahauddin.php">ARMY DOG CENTER MANDI BAHAUDDIN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/okara.php">ARMY DOG CENTER OKARA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sahiwal.php">ARMY DOG CENTER SAHIWAL | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/haroonabad.php">ARMY DOG CENTER HAROONABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/minchnabad.php">ARMY DOG CENTER MINCHNABAD | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/faisalabad.php">ARMY DOG CENTER FAISALABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/chiniot.php">ARMY DOG CENTER CHINIOT | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sargodha.php">ARMY DOG CENTER SARGODHA | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/jhang.php">ARMY DOG CENTER JHANG | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/shorkot.php">ARMY DOG CENTER SHORKOT | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/dera-ismail-khan.php">ARMY DOG CENTER DERA ISMAIL KHAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mainwali.php">ARMY DOG CENTER MAINWALI | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/layyah.php">ARMY DOG CENTER LAYYAH | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/multan.php">ARMY DOG CENTER MULTAN | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/dera-ghazi-khan.php">ARMY DOG CENTER DERA GHAZI KHAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/bahawalpur.php">ARMY DOG CENTER BAHAWALPUR | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/rahim-yar-khan.php">ARMY DOG CENTER RAHIM YAR KHAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/sadqabad.php">ARMY DOG CENTER SADQABAD | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/ubauro-II.php">ARMY DOG CENTER UBAURO | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/daharki-II.php">ARMY DOG CENTER DAHARKI | 03003006220</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mirpur-mathelo-II.php">ARMY DOG CENTER MIRPUR MATHELO | 03332874135</a></li>
<!--KPK cities-->
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/pakistan-II.php">ARMY DOG CENTER PAKISTAN | 03332874135</a></li>
<li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/army-dog-center.php">ARMY DOG CENTER | 03008977885</a></li>

  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/peshawar.php">ARMY DOG CENTER PESHAWAR | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/abbottabad.php">ARMY DOG CENTER ABBOTTABAD | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mardan.php">ARMY DOG CENTER MARDAN | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/swabi.php">ARMY DOG CENTER SWABI | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/nowshera.php">ARMY DOG CENTER NOWSHERA | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kohat.php">ARMY DOG CENTER KOHAT | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/haripur.php">ARMY DOG CENTER HARIPUR | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mansehra.php">ARMY DOG CENTER MANSEHRA | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/bannu.php">ARMY DOG CENTER BANNU | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/dera-ismail-khan.php">ARMY DOG CENTER DERA ISMAIL KHAN | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/charsadda.php">ARMY DOG CENTER CHARSADDA | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/swat.php">ARMY DOG CENTER SWAT | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/malakand.php">ARMY DOG CENTER MALAKAND | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/mingora.php">ARMY DOG CENTER MINGORA | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/hangu.php">ARMY DOG CENTER HANGU | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/karak.php">ARMY DOG CENTER KARAK | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/lakki-marwat.php">ARMY DOG CENTER LAKKI MARWAT | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/chitral.php">ARMY DOG CENTER CHITRAL | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/batkhela.php">ARMY DOG CENTER BATKHELA | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/upper-dir.php">ARMY DOG CENTER UPPER DIR | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/lower-dir.php">ARMY DOG CENTER LOWER DIR | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/haripur-hazara.php">ARMY DOG CENTER HARIPUR HAZARA | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/khyber.php">ARMY DOG CENTER KHYBER | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/frontier-region-kohat.php">ARMY DOG CENTER FRONTIER REGION KOHAT | 03008977885</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/murree.php">ARMY DOG CENTER MURREE | 03332874135</a></li>
  <li><a class="block px-4 py-2 hover:bg-gray-800" href="https://services.armydogcenterpk.com/kashmir.php">ARMY DOG CENTER KASHMIR | 03008977885</a></li>

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