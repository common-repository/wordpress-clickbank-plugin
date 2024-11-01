(function($)
{
    $(function()
    {
        var nmcs = $('#subCategoryIdSource option').clone();
        
        $('#mainCategoryId').change(function()
        {
            var nmcs2 = nmcs.clone();
            var parent = $(this).val();
            var theoptions = '<option value="" SELECTED>- All subcategories -</option>';
            $('#subCategoryId').html('');
            
            nmcs2.each(function() {
                var opt = $(this);
                var id = $(this).val();
                if ($(this).attr("parent") == parent) {
                    theoptions += '<option value="' + id + '">' + opt.html() + '</option>';
                }
            });
            
            $('#subCategoryId').html(theoptions);
            $('#SubCatWhenHidden').hide();
            $('#SubCatTable').show();
        });
    
        function initSubCategory(label)
        {
            var parent = "";
            var selected = $('#subCategoryId option:selected').clone();
            if (selected.attr("path") != null) {
                parent = selected.attr("parent");
                $('#SubCatTable').hide();
                var nmcs2 = nmcs.clone();
                var p = parent;
                var theoptions = '';
                $('#subCategoryId').html("");
                nmcs2.each(function() {
                    var opt = $(this);
                    var id = $(this).val();
                    if ($(this).attr("parent") == p) {
                       theoptions += '<option value="' + id + '">' + opt.html() + '</option>';
                    }
                });
                $('#subCategoryId').html(theoptions);
                $('#subCategoryId option[value=' + selected.val() + ']').attr("selected","selected"); 
                $('#SubCatTable').show();
                $('#mainCategoryId option[value=' + parent + ']').attr("selected","selected"); 
            } else {
                $('#requestNewMkplCategory').hide();
                $('#CatTable').show();
                $('#requestMkplCategoryDiv').show();
                $('#CatTable').show();
                $('#SubCatWhenHidden').show();
            }
        }
    });
})(jQuery);