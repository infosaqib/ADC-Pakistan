    <!-------- Stylesheets  -------->
 
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="../stylesheets/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    </head>
    <body>
    <!-- Footer content goes here -->
<footer class="py-16 px-6 sm:px-14 bg-gray-100 flex flex-col lg:flex-row lg:justify-evenly items-center">
<div>
    <h2 class="my-4 text-indigo-500 font-bold text-4xl sm:text-6xl tracking-widest">Contact us</h2>
    <div class="py-8">
        <p class="my-3 text-indigo-600 text-2xl sm:text-3xl font-semibold tracking-widest">03003006220</p>
        <p class="my-3 text-indigo-600 text-2xl sm:text-3xl font-semibold tracking-widest">03332874135</p>
        <p class="my-3 text-indigo-600 text-2xl sm:text-3xl font-semibold tracking-widest">03213096661</p>
        <p class="my-3 text-indigo-600 text-2xl sm:text-3xl font-semibold tracking-widest">03456826761</p>
    </div>
    <div>
        <p class="text-gray-500  text-xl sm:text-xl">info@armydogcenterpk.com</p>
    </div>
      <nav class="mb-6 flex flex-col justify-center gap-6 my-6">
    <a href="https://youtube.com/@armydogcenter_pak?si=6FmVWh_l6IPzQonI" target="_blank" class="text-blue-500  text-xl hover:text-blue-400 transition">Youtube Channel</a>
        <a href="https://www.facebook.com/share/1Xn673qTYY/" target="_blank" class="text-blue-500  text-xl hover:text-blue-400 transition">Facebook page</a>
  </nav>
</div>
<div name="myForm"  class="my-4 py-8 flex flex-col gap-y-6">
    <div class="flex flex-col lg:flex-row gap-4">
        <div> <input type="text" name="name" id="name" placeholder="Name" required
                class=" py-4 px-16 rounded-lg outline-none placeholder:text-indigo-950 text-sm sm:text-lg font-semibold">
        </div>
        <div> <input type="email" name="email" id="email" placeholder="Email address" required
                class=" py-4 px-16 rounded-lg outline-none placeholder:text-indigo-950 text-sm sm:text-lg font-semibold">
        </div>
    </div>
    <textarea rows="6" cols="12" name="message" id="message" placeholder="Message" required spellcheck="true"
        class="py-4 px-16 rounded-lg outline-none placeholder:text-indigo-950 text-sm sm:text-lg font-semibold"></textarea>
    <button onclick="sendMail()"
        class="bg-indigo-500 hover:bg-indigo-600 py-4 px-16 text-white text-sm sm:text-lg font-semibold tracking-widest cursor-pointer rounded-lg transition-all">SUBMIT</button>
</div>
 <div class="mt-12 border-t border-gray-100">
            <div class="text-center sm:flex sm:justify-between sm:text-left">
              <p class="text-sm text-gray-500">
                <span class="block sm:inline">Website Design by </span> <br>
                  <a href="https://www.linkedin.com/in/connectsaqib/" class="inline-block text-purple-500 font-semibold uppercase transition hover:text-teal-700 tracking-wider " href="#">
                      Hafizsaqib
                    </a>
                    
                    
                </p>
                
                
            </div>
          </div>
</footer>
 <!-- SCRIPTS  -->
<script src="../js/script.js"></script>
<script src="../js/mail.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script type="text/javascript">
    (function () {
        emailjs.init("hj0ktJGt8eMelJAtC");
    })();
</script></body></html>
