<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Masjid Al-Jabbar</title>

	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>

<body style="background-image: url(<?= base_url('assets/img/sheikh-zayed.jpg') ?>)">
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
			<h1 class="text-6xl uppercase">Masjid Al-Jabbar</h1>
			<p class="text-base text-gray-300">
				Jl. Cimincrang No.14, Cimenerang, Kecamatan Gedebage, Kota Bandung, Jawa Barat
			</p>
		</div>
		<div class="text-5xl">
			<span>00:25:00</span>
		</div>
	</header>

	<main class="text-white">
		<section id="current" class="fixed top-[135px] mx-auto inset-x-0 flex justify-center">
			<div class="p-3 bg-purple-950/[.75] rounded-lg">
				<span>Dzuhur 01:00:00</span>
			</div>
		</section>

		<section id="prayer-times" class="px-8 w-screen grid grid-cols-6 gap-4 fixed bottom-[65px]">
			<?php foreach ([1, 2, 3, 4, 5, 6] as $index) : ?>
				<div class="p-4 bg-purple-950/[.75] rounded-lg flex flex-col items-center">
					<small class="text-base font-bold">Imsak</small>
					<span class="text-lg">03:00:00</span>
				</div>
			<?php endforeach ?>
		</section>
	</main>

	<footer class="fixed bottom-0 p-4 bg-white/[.6] whitespace-nowrap">
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis debitis harum a
		doloribus! Ut vero exercitationem eaque blanditiis? Sequi facere illum aspernatur
		doloremque esse assumenda nihil eum ducimus quo quas!
	</footer>
</body>

</html>