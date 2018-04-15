$(function(){
	$('.triger').on({
		'click': function(){
			$(this).next('.target').slideToggle(300);
			$(this).parent().toggleClass('list-group-item-info');
		}
	});
});