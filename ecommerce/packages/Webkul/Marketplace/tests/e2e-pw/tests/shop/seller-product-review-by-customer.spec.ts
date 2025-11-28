import { test, expect } from '../../setup';
import { sellerLogin, sellerRegister, sellerSimpleProduct, sellerApprove, sellerManageProfile } from '../../pages/seller';
import {productFlagStatus} from '../../pages/mp-product-setting';
import { loginAsCustomer } from '../../utils/customer';

test('customer review to seller product', async ({ adminPage }) => {

    /**
     * Navigate to Shop Front page
     */
    await adminPage.goto("");
    await adminPage.click('(//a[@aria-label="Sell"])[1]');
    await adminPage.click('//a[@class="primary-button flex items-center gap-2.5"]');

    await adminPage.waitForSelector('//h1[contains(.," Become Seller ")]');

    await sellerRegister(adminPage);
    
    await adminPage.locator('div.fixed.top-5 ').getByText('Your activation seeks admin approval').isVisible();

    await adminPage.goto('admin/marketplace/sellers');

    await sellerApprove(adminPage);
    
    await expect(adminPage.getByText('Seller updated successfully!')).toBeVisible();

    await adminPage.goto('seller/login');

    await sellerLogin(adminPage);

    await expect(adminPage.locator('//h2[contains(.," Profile Score ")]')).toBeVisible();

    /**
     * Navigate to Manage Profile
     */
    await adminPage.click('//span[contains(.," Manage Profile ")]');
    // await adminPage.waitForTimeout(2000); /* Wait for login to process */

    await adminPage.click('//a[contains(.," Edit Profile ")]');
    await adminPage.waitForURL('seller/profile/edit');

    await sellerManageProfile(adminPage);
    /**
     * Check the Profile is updated successfully.
     */

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Your Profile is updated successfully');    


    await adminPage.goto('seller/products');
 
    /**
     * Click to the Add New Product button
     */
    await adminPage.click('//a[contains(.,"Add New Product")]');

    await adminPage.waitForURL('seller/products/create');

    await sellerSimpleProduct(adminPage);

    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Product updated successfully');
    
    await adminPage.goto('admin/marketplace/products');
    await adminPage.locator('label.icon-uncheckbox').nth(0).click();
    await adminPage.click('//span[contains(.," Select Action ")]');
    const update_product_status = adminPage.locator('//span[contains(.,"Update Status")]');
    await update_product_status.hover();
    await adminPage.click('//a[contains(.,"Approved")]');
    await adminPage.click('//button[contains(.,"Agree")]');
    await expect(adminPage.locator('div.fixed.top-5')).toHaveText('Product Updated successfully. Close ');

    await adminPage.goto('customer/register');
    
    /**
     * Register as a customer
     */

    await loginAsCustomer(adminPage);
    // await adminPage.waitForURL('customer/login');

    await adminPage.waitForURL('');


    // await adminPage.goto('admin/configuration/marketplace/settings')
    await productFlagStatus(adminPage);

    // await adminPage.click('//div[@class="flex flex-row justify-center gap-8 bg-zinc-100 max-sm:gap-1.5"]/div[2]');

    // await adminPage.click('(//div/span[@class="icon-pen text-2xl max-sm:text-lg"])[1]');
    /**
     * select the rating according using the Index
     */
    await adminPage.getByRole('button', { name: 'Reviews' }).click();
    await adminPage.locator('#review-tab').getByText('Write a Review').click();
    await adminPage.click('(//span[@class="icon-star-fill cursor-pointer text-2xl text-amber-500"])[4]');

    /**
     * Fill the Review Form
     */
    await adminPage.fill('//input[@placeholder="Title"]', 'Nice Product Review title');
    await adminPage.fill('//textarea[@placeholder="Comment"]', 'Reviwe Comment');

    /**
     * Click the Submit Button
     */
    await adminPage.click('//button[contains(.," Submit Review ")]');

    await expect(
        adminPage.getByText("Review submitted successfully.").first()
    ).toBeVisible();
});