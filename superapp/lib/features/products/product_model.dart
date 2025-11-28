class Product {
  final int id;
  final String name;
  final int pointCost;
  final String sku;
  final String? image;

  Product({
    required this.id,
    required this.name,
    required this.pointCost,
    required this.sku,
    required this.image,
  });

  factory Product.fromJson(Map<String, dynamic> json) {
    return Product(
      id: json["id"],
      sku: json["sku"] ?? "",
      name: json["name"] ?? "",
      pointCost: json["point_cost"] ?? 0,
      image: json["base_image"]?["medium_image_url"],
    );
  }
}
