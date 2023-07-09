<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'partials/head.php' ?>
</head>

<body class="bg-[#FEFEFE] min-w-screen min-h-screen overflow-x-hidden">
	<div class="w-full h-full flex flex-col xl:flex-row">
		<section class="w-full h-[40vh] header-login flex justify-center items-center min-h-[160px] xl:h-screen p-5">
			<img class="w-full max-w-[240px] xl:max-w-[450px]" src="<?= base_url('assets/img/logo.png') ?>" alt="Awqat Logo">
		</section>

		<section class="w-full h-[60vh] flex items-center min-h-[250px] overflow-auto xl:h-screen">
			<div class="relative w-full max-w-[85vw] xl:max-w-lg mx-auto my-6">
				<form action="<?= current_url() ?>" method="POST">
					<input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">

					<?php if ($this->session->flashdata('failed')) : ?>
						<div class="mb-6 p-4 text-sm text-red-800 font-semibold rounded-lg bg-red-50" role="alert">
							<?= $this->session->flashdata('failed') ?>
						</div>
					<?php endif ?>

					<div class="mb-6">
						<label for="username" class="block font-medium text-slate-700 cursor-pointer">
							Username
						</label>

						<div class="mt-2">
							<input type="text" name="username" id="username" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input your username">
						</div>
					</div>

					<div class="mb-6">
						<label for="password" class="block font-medium text-slate-700 cursor-pointer">
							Password
						</label>

						<div class="mt-2">
							<input type="password" name="password" id="password" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input your password">
						</div>
					</div>

					<div class="mb-0">
						<button class="w-full bg-sky-500 hover:bg-sky-700 py-3 leading-5 rounded-md font-semibold text-white transition duration-100 ease-linear">
							Login
						</button>
					</div>
				</form>
			</div>
		</section>
	</div>
</body>

</html>
