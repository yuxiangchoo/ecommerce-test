import 'package:flutter/material.dart';
import 'package:webview_flutter/webview_flutter.dart';

class EcommerceEmbedPage extends StatefulWidget {
  const EcommerceEmbedPage({Key? key}) : super(key: key);

  @override
  State<EcommerceEmbedPage> createState() => _EcommerceEmbedPageState();
}

class _EcommerceEmbedPageState extends State<EcommerceEmbedPage> {
  late final WebViewController controller;
  bool isLoading = true;

  @override
  void initState() {
    super.initState();

    controller = WebViewController()
      ..setJavaScriptMode(JavaScriptMode.unrestricted)
      ..enableZoom(false)
      ..setBackgroundColor(Colors.white)
      ..setNavigationDelegate(
        NavigationDelegate(
          onPageFinished: (_) => setState(() => isLoading = false),
        ),
      )
      ..loadRequest(Uri.parse("http://192.168.68.100:8000/?embed=superapp"));
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text("E-commerce")),
      body: Stack(
        children: [
          WebViewWidget(controller: controller),

          if (isLoading) const Center(child: CircularProgressIndicator()),
        ],
      ),
    );
  }
}
