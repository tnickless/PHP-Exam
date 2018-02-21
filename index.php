<?php
// implement classes
class product implements \interfaces\IItem
{
	private mixed $id;
	private string $name;
	private int $stock_level;
	private float $price;

	public function create($id, $name, $stock_level, $price)
	{
		return;
	}

	public function getPrice()
	{
		return $price;
	}

	public function getIsInStock()
	{
		if ($product_stock > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function removeStock(int $removeNum)
	{
		$stock_level = $stock_level - $removeNum;
		return;
	}

	public function getStockNo()
	{
		return $stock_level;
	}
}

class customer implements \interfaces\ICustomer
{
	private string $custName;
	private float $custFunds;
	private ICart $custCart;

	private string $history = '';

	public function create($name, $funds, ICart $cart)
	{
		$custName = $name;
		$custFunds = $funds;
		$custCart = new ICart
		return;
	}

	public function getFunds()
	{
		return $custFunds;
	}

	public function removeFunds(int $removeF)
	{
		$custFunds = $custFunds - $removeF;
		return;
	}

	public function getHistory()
	{
		return $history;
	}

	public function addHistory(string $text)
	{
		$history = $history + $text;
		return;
	}

}

class cart implements \interfaces\ICart
{
	// initialise all quantities to zero
	private int $wineQ = 0;
	private int $chocQ = 0;
	private int $roseQ = 0;

	private float $sum;

	public function addItem($item_id, $quantity)
	{
		if ($item_id == 0) {
			$wineQ = $wineQ + $quantity;
		} else if ($item_id == 1) {
			$chocQ = $chocQ + $quantity;
		} else if ($item_id == 2) {
			$roseQ = $roseQ + $quantity;
		}

		return;
	}

	public function changeQuantity($item_id, $quantity)
	{
		if ($item_id == 0) {
			$wineQ = $quantity;
		} else if ($item_id == 1) {
			$chocQ = $quantity;
		} else if ($item_id == 2) {
			$roseQ = $quantity;
		}

		return;
	}

	public function removeItem($item_id)
	{
		// assuming that this function removes ALL items of a given type
		if ($item_id == 0) {
			$wineQ = 0;
		} else if ($item_id == 1) {
			$chocQ = 0;
		} else if ($item_id == 2) {
			$roseQ = 0;
		}

		return;
	}

	public function getItems()
	{
		$itemList = array($wineQ, $chocQ, $roseQ);
		return $itemlist;
	}

	public function sum()
	{
		// assuming sum is totalled prices, as opposed to total Quantity
		$sum = ($wine -> getPrice()) * $wineQ;
		$sum = $sum + ($chocs -> getPrice()) * $chocQ;
		$sum = $sum + ($roses -> getPrice()) * $roseQ;
		return $sum;
	}
}

class loyaltyCustomer implements\interfaces\ILoyaltyCustomer
{
	private float $percentageDiscount;

	public function setDiscount($percentage)
	{
		if ($percentage != 0) {
			$percentageDiscount = $percentage;
			return true;
		} else {
			return false;
		}
	}
}
// ad hoc functions
private function purchase(ICustomer $pCust, $pQuant, $pId)
{
	if ($pId == 0) {
		$cost = $pQuant * $wine -> getPrice();
		$pCust -> removeFunds($cost)
		$wine -> removeStock($pQuant)
		$pCust -> addHistory('Purchased ' + string($pQuant) + ' Wine for £' + $cost + ' \n')
	} else if ($pId == 1) {
		$cost = $pQuant * $chocs -> getPrice();
		$pCust -> removeFunds($cost);
		$chocs -> removeStock($pQuant)
		$pCust -> addHistory('Purchased ' + string($pQuant) + ' Chocolates for £' + $cost + ' \n')
	} else if ($pId == 2) {
		$cost = $pQuant * $roses -> getPrice();
		$pCust -> removeFunds($cost);
		$roses -> removeStock($pQuant)
		$pCust -> addHistory('Purchased ' + string($pQuant) + ' Roses for £' + $cost + ' \n')
	}
}
// 1. create products

$wine = new product;
$wine -> create(0, 'Bottle of Wine', 5, 15.50);

$chocs = new product;
$chocs -> create(1, 'Belgian Chocolate', 3, 9.30);

$roses = new product;
$roses -> create(2, 'Rose', 99, 1.30)

// 2. create customers

$cust1 = new customer;
$cart1 = new cart;
$cust1 -> create('John', 50.00, $cart1);

$cust2 = new customer;
$cart2 = new cart;
$cust2 -> create('Luke', 30.30, $cart2);

$cust3 = new customer;
$cart2 = new cart;
$cust3 -> create('Jaina', 25.30, $cart3);

$cust4 = new customer;
$cart4 = new cart;
$cust4 -> create('Lucy', 90.20, $cart4);

// 3. purchase

//a. John buys 3 Bottles of Wine
purchase($cust1, 3, 0);

//b. Luke buys 5 Roses
purchase($cust2, 5, 2);

//c. John buys 2 Chocolates
purchase($cust1, 2, 1);

//d. Jaina buys 2 Chocolates
purchase($cust3, 2, 1);

//e. Jaina buys 1 Chocolates
purchase($cust3, 1, 1);

//f. Luke buys 1 Bottle of Wine
purchase($cust2, 1, 0);

//g. Jaina buys 12 Roses
purchase($cust3, 12, 2);

//h. John buys 1 Bottle of Wine
purchase($cust1, 1, 0);

//h. Lucy buys 1 Bottle of Wine
purchase($cust4, 1, 0);


// 4. print funds
echo 'John has £' + $cust1 -> getFunds() + ' remaining.';
echo 'Luke has £' + $cust2 -> getFunds() + ' remaining.';
echo 'Jaina has £' + $cust3 -> getFunds() + ' remaining.';
echo 'Lucy has £' + $cust4 -> getFunds() + ' remaining.';

// 5. print stock
echo 'Bottles of Wine: ' + $wine -> getStockNo + ' remaining';
echo 'Belgian Chocolates: ' + $chocs -> getStockNo + ' remaining';
echo 'Roses: ' + $roses -> getStockNo + ' remaining';

// 6. print history
echo 'Purchase History for John \n'
echo $cust1 -> getHistory();

echo 'Purchase History for Luke \n'
echo $cust2 -> getHistory();

echo 'Purchase History for Jaina \n'
echo $cust3 -> getHistory();

echo 'Purchase History for Lucy \n'
echo $cust4 -> getHistory();