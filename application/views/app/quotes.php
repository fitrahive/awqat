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
				<button data-modal-toggle="form-modal" class="py-3 w-fit px-5 bg-sky-500 hover:bg-sky-700 leading-5 rounded-md font-semibold text-white transition duration-100 ease-linear" type="button">
					Add Quote
				</button>

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

				<div class="mt-6">
					<div class="bg-slate-100 border rounded-lg overflow-hidden">
						<table class="border-collapse table-auto w-full">
							<thead>
								<tr>
									<th class="border-b font-medium p-4 pl-8 py-3 text-slate-400 text-left">Quote</th>
									<th class="border-b font-medium p-4 pr-8 py-3 text-slate-400 w-[1%] text-left">Action</th>
								</tr>
							</thead>
							<tbody class="bg-white">
								<?php foreach ($quotes as $quote) : ?>
									<tr>
										<td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
											<?= $quote->quote ?>
										</td>
										<td class="border-b border-slate-100 p-4 pr-8 text-slate-500 w-[1%]">
											<div class="flex gap-2">
												<button data-modal-toggle="form-modal" data-type="edit" data-id="<?= $quote->id ?>" data-quote='<?= json_encode($quote->quote) ?>' class="block text-gray-800 bg-yellow-400 hover:bg-yellow-500 font-medium rounded-lg px-2 py-1.5 text-center" type="button">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit">
														<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
														<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
													</svg>
												</button>
												<button data-delete-id="<?= $quote->id ?>" data-href="<?= base_url('screen/quotes/delete') ?>" class="block text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg px-2 py-1.5 text-center" type="button">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2">
														<path d="M3 6h18" />
														<path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
														<path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
														<line x1="10" x2="10" y1="11" y2="17" />
														<line x1="14" x2="14" y1="11" y2="17" />
													</svg>
												</button>
											</div>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>

		<div id="form-modal" data-title="Quote" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
			<div class="relative w-full max-w-xl max-h-full">
				<div class="relative bg-white rounded-lg shadow">
					<button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="form-modal">
						<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
						</svg>
						<span class="sr-only">Close modal</span>
					</button>

					<div class="px-6 py-6 lg:px-8">
						<h3 class="mb-4 text-xl font-medium text-gray-900">Add Running Text</h3>

						<form class="space-y-4" action="<?= current_url() ?>" method="POST" up-target="main">
							<input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">

							<div>
								<input type="text" name="quote" id="quote" class="px-3 py-2.5 bg-white border shadow-sm border-slate-300 placeholder-slate-400 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1 invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500 disabled:shadow-none transition duration-100 ease-linear" placeholder="Input your text here" required="">
							</div>

							<button type="submit" class="py-3 w-fit px-5 bg-sky-500 hover:bg-sky-700 leading-5 rounded-md font-semibold text-white transition duration-100 ease-linear">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</main>

	<?php include 'partials/footer.php' ?>
	<?php include 'partials/scripts.php' ?>
</body>

</html>
