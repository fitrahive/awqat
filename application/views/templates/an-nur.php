<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Loading...</title>

	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

	<style>
		:root {
			--active-color: #082f49;
		}
	</style>
</head>

<body class="screen" style="background-image: url(<?= base_url('assets/img/medina.jpg') ?>)">
	<header class="w-100 bg-sky-950/[.7] text-white p-8 flex justify-between items-center">
		<div class="flex flex-col justify-between divide-y-2 divide-gray-400 gap-3 text-[3vh] grow-0 shrink-0 basis-[25%]">
			<div class="flex flex-col leading-tight">
				<span id="day">Monday</span>
				<span id="masehi">01 January 2023 M</span>
			</div>

			<div class="pt-4">
				<span id="hijri">08 Jumada al-Akhirah 1444 H</span>
			</div>
		</div>

		<div class="flex flex-col items-center gap-2 grow-0 shrink-0 basis-[50%]">
			<h1 class="text-[7vh] uppercase font-['Jacques_Francois'] mb-4">Loading...</h1>
			<p class="text-[2vh] mb-0 text-gray-300">Loading...</p>
		</div>

		<div class="text-[6vh] grow-0 shrink-0 basis-[25%] text-right">
			<span id="clock">00:00:00</span>
		</div>
	</header>

	<main class="text-white">
		<section id="prayer-times" class="px-8 w-screen grid grid-cols-6 gap-4 fixed top-[23vh]">
			<?php foreach (shalat() as $key) : ?>
				<div class="p-4 bg-[#F2F2F2]/[.85] rounded-lg flex flex-col items-center drop-shadow-lg text-[#FFFEF9]">
					<small class="text-[3.5vh] font-extrabold leading-normal drop-shadow-lg">Loading...</small>
					<span class="text-[7vh] font-medium drop-shadow-lg" id="<?= $key ?>">00:00</span>
				</div>
			<?php endforeach ?>
		</section>

		<section id="current" class="fixed bottom-[10vh] right-8 mx-auto inset-x-0 flex justify-end">
			<div class="py-5 px-6 bg-[#2C4866]/[.8] rounded-lg backdrop-blur-sm" id="next">
				<span class="text-[3.5vh] font-medium">00:00</span>
			</div>
		</section>
	</main>

	<footer class="fixed bottom-0 p-4 bg-white/[.6] whitespace-nowrap w-full text-[4vh]">
		<p>Loading...</p>
	</footer>

	<div id="reload" class="hidden absolute top-0 left-0 w-screen h-screen z-100 bg-gray-800">
		<div class="flex w-full h-full justify-center items-center">
			<h2 class="text-8xl font-bold text-white opacity-100">Reloading...</h2>
		</div>
	</div>

	<script src="<?= base_url('assets/js/HackTimer.silent.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/moment-with-locales.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/moment-hijri.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.easing.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/jquery.marquee.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/adhan.umd.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/screen.js') ?>"></script>
</body>

</html>
