jQuery(function () {

    var selectedoption = $('input[name="type"]:checked').val()
    // rent_buy_options(selectedoption);

    function rent_buy_options(option) {
        var url = window.location.href;

        // Parse the URL to extract the existing query parameters
        var urlObj = new URL(url);
        var queryParams = urlObj.searchParams;
        if (option == "rent") {
    queryParams.set('category', 'R');
        } else {
            queryParams.set('category', 's');
        }
        urlObj.search = queryParams.toString();
        var updatedUrl = urlObj.toString();
        window.location.href = updatedUrl;
    }
    $('input[name="type"]').on('change', function() {
        // Retrieve the selected radio button value
        var option = $(this).val();
        rent_buy_options(option)
      });



      $('#budgetMin').on('change',function() {
        var selectedMinBudget = $(this).val();

        // Filter max budget dropdown options
        if (selectedMinBudget === "") {
            resetDropdowns();
        } else {
        $('#maxBudjet option').each(function() {
            var optionValue = parseInt($(this).val());
            if (optionValue <= selectedMinBudget) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    }
    });

    // Capture change event for max budget dropdown
    $('#maxBudjet').on('change',function() {
        var selectedMaxBudget = $(this).val();
        console.log(selectedMaxBudget)
        // Filter min budget dropdown options
        if (selectedMaxBudget === "") {
            resetDropdowns();
        } else {
        $('#budgetMin option').each(function() {
            var optionValue = parseInt($(this).val());
            if (optionValue >= selectedMaxBudget) {
                $(this).hide();
                } else {
                    $(this).show();
            }
        });
    }
    });
    function resetDropdowns() {
        $('#budgetMin, #maxBudjet').val('');
        $('#budgetMin option, #maxBudjet option').show();
    }
})