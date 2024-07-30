<script type="module">

	$(document).ready(function () {
		setTimeout(function (){
			$.fn.select2.defaults.set("theme", "bootstrap-5");
			$.fn.select2.defaults.set("dir", "rtl");
			$.fn.select2.defaults.set("cache", true);
			// $.fn.select2.defaults.set("language", 'fa');
			$.fn.select2.defaults.set('debug', true);


			$('.select2').select2({
				language:{
					errorLoading: function () {
						return 'امکان بارگذاری نتایج وجود ندارد.';
					},
					inputTooLong: function (args) {
						var overChars = args.input.length - args.maximum;

						return 'لطفاً ' + overChars + ' کاراکتر را حذف نمایید';
					},
					inputTooShort: function (args) {
						var remainingChars = args.minimum - args.input.length;

						return 'لطفاً تعداد ' + remainingChars + ' کاراکتر یا بیشتر وارد نمایید';
					},
					loadingMore: function () {
						return 'در حال بارگذاری نتایج بیشتر...';
					},
					maximumSelected: function (args) {
						return 'شما تنها می‌توانید ' + args.maximum + ' آیتم را انتخاب نمایید';
					},
					noResults: function () {
						return 'هیچ نتیجه‌ای یافت نشد';
					},
					searching: function () {
						return 'در حال جستجو...';
					},
					removeAllItems: function () {
						return 'همه موارد را حذف کنید';
					}
				}
			});
		},1000)

	});
</script>