import '../wallet/wallet_service.dart';
import '../products/product_model.dart';

class RedeemService {
  static Future<bool> redeem(Product p) async {
    await Future.delayed(Duration(milliseconds: 300));
    return WalletService.deduct(p.pointCost);
  }
}
