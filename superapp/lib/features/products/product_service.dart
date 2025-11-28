import '../../core/api.dart';
import 'product_model.dart';

class ProductService {
  static Future<List<Product>> getProducts() async {
    final res = await Api.get("/products");

    final List data = res["data"];

    return data.map((e) => Product.fromJson(e)).toList();
  }
}
