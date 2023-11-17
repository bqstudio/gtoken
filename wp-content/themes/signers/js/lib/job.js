jQuery(document).ready(function () {
    const searchForm = jQuery('#togetherwork_search');
    const keywordInput = jQuery('#keyword');
    const jobCont = jQuery('.job-cont__content');
    const resultDisplay = searchForm.find('.result');

    searchForm.on('submit', function (e) {
        e.preventDefault();

        const keyword = keywordInput.val().trim().toLowerCase(); // Convertir a minúsculas

        if (keyword.length > 0) {
            const results = jobCont.find('.irongforce-job-listing').filter(function () {
                return jQuery(this).text().toLowerCase().includes(keyword);
            });

            if (results.length > 0) {
                jobCont.find('.irongforce-job-listing').hide();
                results.show();
                resultDisplay.html(results.length + ' result(s) found');
            } else {
                jobCont.find('.irongforce-job-listing').show();
                resultDisplay.html('No results found');
            }
        } else {
            jobCont.find('.irongforce-job-listing').show();
            resultDisplay.empty();
        }
    });
});
