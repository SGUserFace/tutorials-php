$(document).ready(function(){

	var shoppingCart = function(){

		var _setCartTotalValueOnLayout = function(){

			var _global = global();

			var _urlTotal = _global.baseUrl + '/public/shoppingCart/getTotalToJSON';

			var _idCartTotal = '#cartTotalOnCartWidget';

			$.ajax({
				type: "GET",
				url: _urlTotal,
				success: function(data){
					var value = JSON.parse(data);
					$(_idCartTotal).html(value);
				}
			});
		}

		return {

			setCartTotalValueOnLayout: _setCartTotalValueOnLayout
		}
	};

	var sc = shoppingCart();

	sc.setCartTotalValueOnLayout();

});
