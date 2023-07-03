<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $name ?></title>

	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

	<style>
		:root {
			--active-color: #082f49;
		}
	</style>

	<script type="application/json" id="data">
		<?= $json ?>
	</script>
</head>

<body class="screen" style="background-image: url(<?= base_url('assets/img/medina.jpg') ?>)">
	<header class="w-100 bg-sky-950/[.7] text-white p-8 flex justify-between items-center">
		<div class="flex flex-col justify-between divide-y-2 divide-gray-400 gap-3 text-xl grow-0 shrink-0 basis-[20%]">
			<div class="flex flex-col">
				<span id="day">Senin</span>
				<span id="masehi">01 Januari 2023 M</span>
			</div>

			<div class="pt-4">
				<span id="hijri">08 Jumada al-Akhirah 1444 H</span>
			</div>
		</div>

		<div class="flex flex-col items-center gap-2 grow-0 shrink-0 basis-[60%]">
			<h1 class="text-7xl uppercase font-['Jacques_Francois'] mb-4"><?= $name ?></h1>
			<p class="text-lg mb-0 text-gray-300"><?= $address ?></p>
		</div>

		<div class="text-6xl grow-0 shrink-0 basis-[20%] text-right">
			<span id="clock">00:00:00</span>
		</div>
	</header>

	<main class="text-white">
		<section id="prayer-times" class="px-8 w-screen grid grid-cols-6 gap-4 fixed top-[23vh]">
			<?php foreach (shalat() as $key) : ?>
				<div class="p-4 bg-[#F2F2F2]/[.85] rounded-lg flex flex-col items-center drop-shadow-lg text-[#FFFEF9]">
					<small class="text-2xl font-extrabold drop-shadow-lg"><?= $label[$key] ?></small>
					<span class="text-4xl font-medium drop-shadow-lg" id="<?= $key ?>">00:00</span>
				</div>
			<?php endforeach ?>
		</section>

		<section id="current" class="fixed bottom-[10vh] right-8 mx-auto inset-x-0 flex justify-end">
			<div class="py-5 px-6 bg-[#2C4866]/[.8] rounded-lg backdrop-blur-sm" id="next">
				<span class="text-3xl font-medium"><?= $label['fajr'] ?> 00:00</span>
			</div>
		</section>
	</main>

	<footer class="fixed bottom-0 p-4 bg-white/[.6] whitespace-nowrap w-full text-xl">
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis debitis harum a
			doloribus! Ut vero exercitationem eaque blanditiis? Sequi facere illum aspernatur
			doloremque esse assumenda nihil eum ducimus quo quas!
		</p>
	</footer>

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
