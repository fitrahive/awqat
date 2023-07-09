<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'partials/head.php' ?>
</head>

<body class="antialiased bg-[#FEFEFE] min-w-screen min-h-screen overflow-x-hidden text-[#35321B] flex flex-col justify-between">
	<main>
		<?php include 'partials/header.php' ?>

		<section class="max-w-[90rem] mx-auto w-full">
			<div class="p-8">
				<?php if ($this->session->flashdata('failed')) : ?>
					<div class="mt-4 p-4 text-sm text-red-800 font-semibold rounded-lg bg-red-50" role="alert">
						<?= $this->session->flashdata('failed') ?>
					</div>
				<?php endif ?>
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="mt-4 p-4 text-sm text-emerald-800 font-semibold rounded-lg bg-emerald-50" role="alert">
						<?= $this->session->flashdata('success') ?>
					</div>
				<?php endif ?>

				<form class="mt-4" action="<?= current_url() ?>" method="POST" up-target="main">
					<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8">
						<div class="col-span-1">
							<div class="mb-6">
								<label for="name" class="block font-medium text-slate-700 cursor-pointer">
									Mosque Name
								</label>

								<div class="mt-2">
									<input type="text" name="name" id="name" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input mosque name" value="<?= $settings['name'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="address" class="block font-medium text-slate-700 cursor-pointer">
									Mosque Address
								</label>

								<div class="mt-2">
									<input type="text" name="address" id="address" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input mosque address" value="<?= $settings['address'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="locale" class="block font-medium text-slate-700 cursor-pointer">
									Date Time Locale
								</label>

								<div class="mt-2">
									<select id="locale" name="locale" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear appearance-none">
										<?php foreach (locale() as $val => $text) : ?>
											<option value="<?= $val ?>" <?= $settings['locale'] === $val ? 'selected' : '' ?>><?= $text ?> (<?= $val ?>)</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>

						<div class="col-span-1">
							<div class="mb-6">
								<label for="method" class="block font-medium text-slate-700 cursor-pointer">
									Prayer Calculation Method
								</label>

								<div class="mt-2">
									<select id="method" name="method" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear appearance-none">
										<?php foreach (method() as $val => $text) : ?>
											<option value="<?= $val ?>" <?= $settings['method'] === $val ? 'selected' : '' ?>><?= $text ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="mb-6">
								<label for="latitude" class="block font-medium text-slate-700 cursor-pointer">
									Mosque Latitude
								</label>

								<div class="mt-2">
									<input type="text" name="latitude" id="latitude" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input mosque latitude" value="<?= $settings['latitude'] ?>">
								</div>
							</div>

							<div class="mb-6">
								<label for="longitude" class="block font-medium text-slate-700 cursor-pointer">
									Mosque Longitude
								</label>

								<div class="mt-2">
									<input type="text" name="longitude" id="longitude" class="px-4 py-3 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input mosque longitude" value="<?= $settings['longitude'] ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="mt-4 lg:mt-0 lg:flex lg:justify-end mb-6">
						<button type="submit" class="w-full py-3 lg:w-fit lg:px-5 bg-sky-500 hover:bg-sky-700 leading-5 rounded-md font-semibold text-white transition duration-100 ease-linear">
							Save
						</button>
					</div>
				</form>
			</div>
		</section>
	</main>

	<?php include 'partials/footer.php' ?>
	<?php include 'partials/scripts.php' ?>
</body>

</html>
