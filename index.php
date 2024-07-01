<?php

?>


<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fosol</title>
  <script src="https://kit.fontawesome.com/30054225a9.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
            "fosol-btn": "#609966",
            "fosol-bg": "#DDE6ED",
          },
        },
      },
    };
  </script>
  <style>
    /* Custom styles */
    .video-container {
      position: relative;
      overflow: hidden;
    }

    .video-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.5);
      /* Slightly blackish transparent background */

    }
  </style>
</head>

<body>
  <header class="">
    <nav class="bg-fosol-bg px-5 sticky top-0">
      <div class="navbar ">
      <div class="flex-1">
      <!-- <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
              <li><a href="">আমাদের সম্পর্কে জানুন</a></li>
              <li><a href="">আমাদের দল</a></li>
              <li>
                <a>আমাদের সমাধান সমূহ</a>
                <ul class="p-2">
                  <li><a>কৃষকদের জন্য</a></li>
                  <li><a>সাপ্লাই চেইন</a></li>
                  <li><a>কৃষি পরিসেবা</a></li>
                </ul>
              </li>
              <li><a>সফল</a></li>
              <li><a>একাউন্ট খুলুন</a></li>
              <li><a>ক্যারিয়ার</a></li>
            </ul>
          </div> -->
          <a class="btn btn-ghost normal-case text-2xl">ফসল</a>
        </div>
        <div class="navbar-center hidden lg:flex ">
          <ul class="menu menu-horizontal px-1 space-x-5  items-center">
            <li><a href="aboutus.php">আমাদের সম্পর্কে জানুন</a></li>
            <li tabindex="0">
              <details>
                <summary>আমাদের সমাধান সমূহ</summary>
                <ul class="p-2">
                  <li><a>কৃষকদের জন্য</a></li>
                  <li><a>সাপ্লাই চেইন</a></li>
                  <li><a>কৃষি পরিসেবা</a></li>
                </ul>
              </details>
            </li>
            <li><a href="signup.php">একাউন্ট খুলুন</a></li>
            <li><a href="login.php">প্রবেশ করুন</a></li>
            <!-- <li><a>ব্লগ</a></li>
            <li><a>ক্যারিয়ার</a></li> -->
          </ul>
        </div>
        <div class="space-x-1">
          <a class="btn bg-fosol-btn text-white font-semibold">En</a>
          <a class="btn bg-slate-400 text-white font-semibold">Bn</a>
        </div>
      </div>
    </nav>
    <!-- Banner section -->

    <div class="video-container  ">
      <video class="video-background" autoplay loop muted>
        <source src="bg-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>

      <div class="h-screen flex items-center justify-center text-white text-center ">
        <div>
          <h1 class="text-4xl font-bold w-1/2 mx-auto ">আগামীর কৃষি, ফসলের সাথে!</h1>
        </div>
      </div>
    </div>

    <div class="overlay text-white py-12 w-3/4 mx-auto relative lg:top-[-300px] ">
      <div class="container mx-auto flex flex-col lg:flex-row justify-center items-center">
        <!-- Column 1 -->
        <div class="w-1/4  sm:border-0 lg:border-r border-gray-600 p-0 lg:px-4 text-center">
          <div class="mb-4">
            <i class="fa-solid fa-wheat-awn text-4xl text-fosol-btn"></i>

          </div>
          <h2 class="text-xl font-bold">উন্নত কৃষি পন্য</h2>
          <p>বাজার সেরার নিশ্চয়তা</p>
        </div>

        <!-- Column 3 -->
        <div class="w-1/4 border-0 lg:border-r border-gray-600 p-0 lg:px-4 text-center">
          <div class="mb-4">
            <i class="fa-solid fa-hand-holding-hand text-4xl text-fosol-btn"></i>

          </div>
          <h2 class="text-xl font-bold">কৃষি সেবা</h2>
          <p>২৪/৭ কাস্টমার কেয়ার</p>
        </div>

        <!-- Column 4 -->
        <div class="w-1/4 p-0 lg:px-4 text-center ">
          <div class="mb-4">
            <i class="fa-solid fa-leaf text-4xl text-fosol-btn"></i>

          </div>
          <h2 class="text-xl font-bold">ইকো ফ্রেন্ডলি</h2>
          <p>কার্বন নিঃস্বরণ দূরিকরণ</p>
        </div>
      </div>
    </div>

  </header>
  <main class="md:container md:mx-auto">
    <div class="text-center ">
      <!-- Identity section -->
      <div class="space-y-5">
        <h1 class="text-4xl font-semibold">আমাদের পরিচয়</h1>
        <p class="text-sm text-gray-500">ফসল একটি প্রযুক্তি প্রতিষ্ঠান যা ক্ষুদ্র ও প্রান্তিক কৃষক এবং
          কৃষি সম্পর্কিত ব্যবসায় প্রতিষ্ঠানের লাভ সর্বাধিকীকরণের জন্য কাজ করে।</p>
      </div>

      <div class="my-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20 px-5">
        <!-- Card one -->
        <div class="card w-96 bg-base-100 shadow-xl">
          <figure><img src="farmer.svg" alt="farmer" /></figure>
          <div class="card-body text-center">
            <h2 class="text-2xl font-semibold text-fosol-btn">কৃষক</h2>
            <p class="text-gray-500">আমরা কৃষকদের অর্থায়ন, ইনপুট, কৃষি সংক্রান্ত পরামর্শ এবং বাজারে অনুপ্রবেশে/এক্সেসে
              সহায়তা করি</p>

          </div>
        </div>

        <!-- Card 2 -->
        <div class="card w-96 bg-base-100 shadow-xl">
          <figure><img src="industry.svg" alt="farmer" /></figure>
          <div class="card-body text-center">
            <h2 class="text-2xl font-semibold text-fosol-btn">কৃষিভিত্তিক প্রতিষ্ঠান</h2>
            <p class="text-gray-500">আমরা কৃষিভিত্তিক প্রতিষ্ঠানের সাথে কাজ করি যাতে তারা কৃষকদের মানসম্পন্ন ইনপুট এবং
              ফার্ম মেশিনারি বিক্রয় এবং পরিষেবা সরবরাহ করতে পারে।</p>

          </div>
        </div>
        <!-- Card 3 -->
        <div class="card w-96 bg-base-100 shadow-xl">
          <figure><img src="payment.svg" alt="farmer" /></figure>
          <div class="card-body text-center">
            <h2 class="text-2xl font-semibold text-fosol-btn">ক্রেতা</h2>
            <p class="text-gray-500">আমরা বড় বড় এন্টারপ্রাইজ, পাইকারি ও খুচরা মার্কেটের ক্রেতাদের কাছে
              প্রতিযোগিতামূলক/ন্যায্য মূল্যে উচ্চমানসম্পন্ন কৃষিপণ্য সরবরাহ করি</p>

          </div>
        </div>
      </div>



    </div>

    <!-- Post section -->
    <div class="mt-36">
      <div class="hero  ">
        <div class="flex flex-col lg:flex-row gap-x-36">
          <img src="tag1.webp" class=" rounded-lg shadow-2xl" />
          <div>
            <h1 class="text-5xl font-bold w-auto text-right leading-relaxed">কৃষকের জন্য বাজার প্রবেশাধিকার সহজীকরণ</h1>
            <p class="py-6 text-right text-gray-400">আমরা আমাদের প্রযুক্তি-সক্ষম সাপ্লাই চেইন নেটওয়ার্ক ব্যবহার করে
              সরাসরি কৃষকের কাছ থেকে
              সদ্য উৎপাদিত পণ্য সংগ্রহ করি। একইসাথে আমরা কৃষকদের প্রতিযোগিতামূলক ও ন্যায্য মূল্য,
              সহজ পরিশোধ শর্ত এবং লজিস্টিক সাপোর্ট প্রদানে কাজ করি। আমরা বিভিন্ন পর্যায়ের পাইকারি ও খুচরা বিক্রেতা,
              প্রস্তুতকারক এবং রপ্তানিকারক সাথে কাজ করি যাতে কৃষকের একাধিক মধ্যস্থতাকারীর হস্তক্ষেপ ছাড়াই
              প্রতিযোগিতামূলক মূল্যে মার্কেটে প্রবেশাধিকার নিশ্চিত হয়।</p>
            <div class="flex justify-end">
              <button class="btn  bg-fosol-btn font-semibold text-white">আরো জানুুন</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- testimonial section  -->
    <section class="mt-36">
      <h1 class="text-5xl text-center font-semibold">অভিব্যাক্তি</h1>
      <div class="carousel w-full pt-12">
        <div id="slide1" class="carousel-item relative w-full flex-col justify-center items-center space-y-10 ">
          <div class="text-center w-1/2 flex flex-col justify-center items-center">
            <img class="w-14" src="/Home/images-fosol/quote-sign.png" alt="">
            <p class="italic">

              ফসলের কৃষি পরামর্শ পরিষেবা খুব কার্যকর এবং আমি এটিকে খুব
              প্রয়োজনীয় বলে মনে করি। তারা এসএমএস-এর মাধ্যমে পরামর্শ দিয়ে আমাদের আপডেট রাখে
              । আমি আমার প্রয়োজনীয় পরামর্শ খুব সহজেই পেয়ে যাই।

            </p>
          </div>
          <div class="flex flex-col items-center space-y-3">
            <img class="w-14 rounded-full" src="user1.PNG" alt="">
            <h3 class="font-semibold">সোউদ বাবু</h3>
            <p class="text-sm text-gray-400">আলু চাষি</p>
          </div>
          <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide4" class="btn btn-circle">❮</a>
            <a href="#slide2" class="btn btn-circle">❯</a>
          </div>
        </div>

        <!-- <div id="slide2" class="carousel-item relative w-full flex-col justify-center items-center space-y-10">
          <div class="text-center w-1/2 flex flex-col justify-center items-center">
            <img class="w-14" src="/Home/images-fosol/quote-sign.png" alt="">
            <p class="italic">

              ফসলের কৃষি পরামর্শ পরিষেবা খুব কার্যকর এবং আমি এটিকে খুব
              প্রয়োজনীয় বলে মনে করি। তারা এসএমএস-এর মাধ্যমে পরামর্শ দিয়ে আমাদের আপডেট রাখে
              । আমি আমার প্রয়োজনীয় পরামর্শ খুব সহজেই পেয়ে যাই।

            </p>
          </div>
          <div class="flex flex-col items-center space-y-3">
            <img class="w-14 rounded-full" src="/Home/images-fosol/user1.PNG" alt="">
            <h3 class="font-semibold">সোউদ বাবু</h3>
            <p class="text-sm text-gray-400">আলু চাষি</p>
          </div>
          <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide1" class="btn btn-circle">❮</a>
            <a href="#slide3" class="btn btn-circle">❯</a>
          </div>
        </div>
         -->

    </section><br>

    <!-- Our prizes -->
    <!-- <section class="mt-36">
      <h1 class="text-5xl font-semibold text-center">পুরস্কার এবং স্বীকৃতি</h1>
      <div class="flex flex-wrap  justify-between mt-32">
        <div><img class="w-40" src="images-fosol/prize/prize1.png" alt=""></div>
        <div><img class="w-40" src="images-fosol/prize/prize-2.jpg" alt=""></div>
        <div><img class="w-40" src="images-fosol/prize/prize-3.png" alt=""></div>
        <div><img class="w-40" src="images-fosol/prize/prize4.png" alt=""></div>
        <div><img class="w-40" src="images-fosol/prize/prize5.jpg" alt=""></div>
      </div>
    </section> -->

    <!-- Our partners section -->

    <!-- <section class="mt-36">
      <div>
        <h1 class="text-5xl font-semibold text-center">আমাদের অংশীদারসমূহ</h1>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-24 mt-28 w-3/4 mx-auto">
          <div><img class="w-28" src="images-fosol/partners/p-1.jpg" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-2.jpg" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-3.webp" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-4.png" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-5.png" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-6.png" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-7.jfif" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-8.jpg" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-9.png" alt=""></div>
          <div><img class="w-28" src="images-fosol/partners/p-10.png" alt=""></div>
        </div>
      </div>
    </section> -->

    <!-- Membership -->
    <!-- <section class="mt-36">
      <h1 class="text-5xl font-semibold text-center">আমাদের সদস্যপদসমূহ</h1>
      <div class="flex flex-wrap  justify-between mt-32">
        <div><img class="w-40" src="m-1.png" alt=""></div>
        <div><img class="w-40" src="m-2.png" alt=""></div>
        <div><img class="w-40" src="m-3.png" alt=""></div>

      </div>
    </section>
 -->
 <section id="message" class=" p-5 bg-green-300 rounded">
      <h1 class="text-4xl font-semibold text-center mb-5">যোগাযোগের মাধ্যম</h1>
      <p class="text-center text-gray-600">যেকোন জিজ্ঞাসা বা আমাদের ব্যবসায়িক কার্যক্রমে আগ্রহী হলে আমাদের একটি বার্তা
        পাঠান এবং
        আমাদের টিমের পক্ষ থেকে আপনার সাথে যোগাযোগ করা হবে।</p>
      <div class="flex flex-col items-center">
        <form action="">
        <input class="border-b  block w-3/4 p-5 mt-5 bg-green-300" type="text" name="naam"
          placeholder="নাম" id="">
        <input class="border-b  block w-3/4 p-5 mt-5 bg-green-300" type="email" name="mail"
          placeholder="ইমেইল" id="">
        <input class="border-b  block w-3/4 p-5 mt-5   bg-green-300" type="tel" name="number"
          placeholder="মোবাইল নম্বর" id="">
        <input class="border-b  block w-3/4 p-5 mt-5  bg-green-300" type="text" name="message"
          placeholder="বার্তা" id="">
        <input class="btn bg-fosol-btn w-3/4 text-white font-semibold border-none mt-5" type="submit" name="save"
          value="প্রেরণ করুণ" id="mess">
        </form>
      </div>

    </section>
  </main>
      <!-- Form section -->

  <footer class="footer p-10 bg-neutral text-neutral-content mt-5 flex justify-around">
    <aside>

      <p class="text-4xl font-semibold">ফসল<br /><span class="text-xl text-gray-400">বাংলার ডিজিটাল কৃষি</span></p>
    </aside>
    <nav>
      <header class="footer-title">সামাজিক মাধ্যম</header>
      <div class="grid grid-flow-col gap-4">
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
            <path
              d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
            </path>
          </svg></a>
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
            <path
              d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
            </path>
          </svg></a>
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
            <path
              d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
            </path>
          </svg></a>
      </div>
    </nav>

  </footer>
</body>

</html>