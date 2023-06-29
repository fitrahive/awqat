<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Masjid Al-Jabbar</title>

	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>

<body class="screen" style="background-image: url(<?= base_url('assets/img/medina.jpg') ?>)">
	<header class="w-100 bg-sky-950/[.7] text-white p-4 flex justify-between items-center">
		<div class="flex flex-col divide-y-2 divide-gray-400 gap-3">
			<div class="flex flex-col">
				<span>Selasa</span>
				<span>22 Juni 2023 M</span>
			</div>

			<div class="pt-2">
				<span>3 Dzulhijjah 1444 H</span>
			</div>
		</div>
		<div class="flex flex-col items-center gap-2">
			<h1 class="text-6xl uppercase font-['Jacques_Francois']">Masjid Al-Jabbar</h1>
			<p class="text-base text-gray-300">
				Jl. Cimincrang No.14, Cimenerang, Kecamatan Gedebage, Kota Bandung, Jawa Barat
			</p>
		</div>
		<div class="text-5xl">
			<span>00:25:00</span>
		</div>
	</header>

	<main class="text-white">
		<section id="prayer-times" class="px-8 w-screen grid grid-cols-6 gap-4 fixed top-[155px]">
			<?php foreach ([1, 2, 3, 4, 5, 6] as $index) : ?>
				<div class="p-4 bg-[#F2F4F5]/[.85] rounded-lg flex flex-col box-shadow-lg">
					<small class="text-base font-bold text-[#FFFEF9]" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Imsak</small>
					<span class="text-2xl" style="text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">03:00:00</span>
				</div>
			<?php endforeach ?>
		</section>

		<section id="current" class="fixed bottom-[65px] right-[30px]">
			<div class="p-3 bg-[#2C4866]/[.8] rounded-lg">
				<span>Dzuhur 01:00:00</span>
			</div>
		</section>
	</main>

	<footer class="fixed bottom-0 p-4 bg-white/[.6] whitespace-nowrap">
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis debitis harum a
		doloribus! Ut vero exercitationem eaque blanditiis? Sequi facere illum aspernatur
		doloremque esse assumenda nihil eum ducimus quo quas!
	</footer>
</body>

</html>
