import 'dart:convert';
import 'package:http/http.dart' as http;

class Api {
  static const baseUrl = "http://192.168.68.100:8000/api";

  static Future<dynamic> get(String path) async {
    final res = await http.get(Uri.parse("$baseUrl$path"));

    if (res.statusCode >= 200 && res.statusCode < 300) {
      return jsonDecode(res.body);
    } else {
      throw Exception("Api GET failed: ${res.body}");
    }
  }
}
