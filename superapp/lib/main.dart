import 'package:flutter/material.dart';
import 'features/products/products_page.dart';
import 'features/ecommerce_embed/ecommerce_embed_page.dart';

void main() {
  runApp(const SuperAppMock());
}

class SuperAppMock extends StatelessWidget {
  const SuperAppMock({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'SuperApp Mock',
      theme: ThemeData(useMaterial3: true, colorSchemeSeed: Colors.blue),
      home: const MainMenu(),
    );
  }
}

class MainMenu extends StatelessWidget {
  const MainMenu({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("SuperApp Demo")),
      body: ListView(
        padding: const EdgeInsets.all(16),
        children: [
          ListTile(
            leading: const Icon(Icons.shopping_bag),
            title: const Text("Embedded App Api"),
            // subtitle: const Text("Native UI — uses Bagisto REST API"),
            onTap: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (_) => ProductsPage()),
              );
            },
          ),
          const Divider(),
          ListTile(
            leading: const Icon(Icons.web),
            title: const Text("Embedded Ecommerce Website"),
            subtitle: const Text("Full Bagisto UI inside WebView"),
            onTap: () {
              Navigator.push(
                context,
                MaterialPageRoute(builder: (_) => const EcommerceEmbedPage()),
              );
            },
          ),
        ],
      ),
    );
  }
}
