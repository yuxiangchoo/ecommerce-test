class WalletService {
  static int currentPoints = 3000;

  static int getBalance() {
    return currentPoints;
  }

  static bool deduct(int cost) {
    if (cost > currentPoints) return false;
    currentPoints -= cost;
    return true;
  }
}
