<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $page ?></title>

	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

	<style>
		:root {
			--header-image: url("<?= base_url('assets/img/medina.jpg') ?>");
		}
	</style>
</head>

<body class="antialiased bg-[#FEFEFE] min-w-screen min-h-screen overflow-x-hidden text-[#35321B] flex flex-col justify-between">
	<main>
		<?php include 'partials/header.php' ?>

		<section class="max-w-[90rem] mx-auto w-full">
			<div class="flex flex-col lg:flex-row gap-8 xl:px-4 py-8">
				<div class="h-fit basis-1/2 own-shadow xl:rounded-lg">
					<div class="px-8 py-4 border-b">
						<h4 class="text-lg font-medium">Profile</h4>
					</div>

					<form class="p-8 pt-6" action="<?= current_url() ?>" method="POST">
						<input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">

						<?php if ($this->session->flashdata('failed-profile')) : ?>
							<div class="mb-6 p-4 text-sm text-red-800 font-semibold rounded-lg bg-red-50" role="alert">
								<?= $this->session->flashdata('failed-profile') ?>
							</div>
						<?php endif ?>
						<?php if ($this->session->flashdata('success-profile')) : ?>
							<div class="mb-6 p-4 text-sm text-emerald-800 font-semibold rounded-lg bg-emerald-50" role="alert">
								<?= $this->session->flashdata('success-profile') ?>
							</div>
						<?php endif ?>

						<div class="mb-6">
							<label for="username" class="blockfont-medium text-slate-700 cursor-pointer">
								Username
							</label>

							<div class="mt-2">
								<input type="text" name="username" id="username" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input your username" value="<?= $this->userdata->login ?>">
							</div>
						</div>

						<div class="mb-6">
							<label for="name" class="blockfont-medium text-slate-700 cursor-pointer">
								Name
							</label>

							<div class="mt-2">
								<input type="text" name="name" id="name" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input your name" value="<?= $this->userdata->name ?>">
							</div>
						</div>

						<div class="mb-6">
							<label for="email" class="blockfont-medium text-slate-700 cursor-pointer">
								Email
							</label>

							<div class="mt-2">
								<input type="email" name="email" id="email" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input your email" value="<?= $this->userdata->email ?>">
							</div>
						</div>

						<div class="mb-0">
							<button name="profile" value="1" class="w-full bg-sky-500 hover:bg-sky-700 py-3 leading-5 rounded-md font-semibold text-white transition duration-100 ease-linear">
								Save
							</button>
						</div>
					</form>
				</div>

				<div class="h-fit basis-1/2 own-shadow xl:rounded-lg">
					<div class="px-8 py-4 border-b">
						<h4 class="text-lg font-medium">Change Password</h4>
					</div>

					<form class="p-8 pt-6" action="<?= current_url() ?>" method="POST">
						<input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">

						<?php if ($this->session->flashdata('failed-password')) : ?>
							<div class="mb-6 p-4 text-sm text-red-800 font-semibold rounded-lg bg-red-50" role="alert">
								<?= $this->session->flashdata('failed-password') ?>
							</div>
						<?php endif ?>
						<?php if ($this->session->flashdata('success-password')) : ?>
							<div class="mb-6 p-4 text-sm text-emerald-800 font-semibold rounded-lg bg-emerald-50" role="alert">
								<?= $this->session->flashdata('success-password') ?>
							</div>
						<?php endif ?>

						<div class="mb-6">
							<label for="current" class="blockfont-medium text-slate-700 cursor-pointer">
								Current Password
							</label>

							<div class="mt-2">
								<input type="password" name="current" id="current" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input your password">
							</div>
						</div>

						<div class="mb-6">
							<label for="new" class="blockfont-medium text-slate-700 cursor-pointer">
								New Password
							</label>

							<div class="mt-2">
								<input type="password" name="new" id="new" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input your new password">
							</div>
						</div>

						<div class="mb-6">
							<label for="confirm" class="blockfont-medium text-slate-700 cursor-pointer">
								Confirm New Password
							</label>

							<div class="mt-2">
								<input type="password" name="confirm" id="confirm" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Confirm your new password">
							</div>
						</div>

						<div class="mb-0">
							<button name="password" value="1" class="w-full bg-sky-500 hover:bg-sky-700 py-3 leading-5 rounded-md font-semibold text-white transition duration-100 ease-linear">
								Save
							</button>
						</div>
					</form>
				</div>
			</div>
		</section>
	</main>

	<?php include 'partials/footer.php' ?>

	<script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>
