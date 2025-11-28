import { test, expect } from '../../setup';
import  * as forms from '../../utils/form';

import {
    generateName,
    generateEmail,
    generateDescription,
} from "../../utils/faker";


test('admin assign category for seller', async ({ adminPage }) => {

    await adminPage.goto('admin/catalog/categories');
    await adminPage.waitForSelector('div.primary-button', { state: 'visible' });
    await adminPage.click('div.primary-button:visible');

    const concatenatedNames = Array(5)
        .fill(null)
        .map(() => forms.generateRandomProductName())
        .join(' ')
        .replaceAll(' ', '');

    await adminPage.waitForSelector('form[action*="/catalog/categories/create"]');

    /**
     * General Section.
     */
    await adminPage.fill('input[name="name"]', concatenatedNames);
    await adminPage.click('label:has-text("Root")');

    /**
     * Settings Section.
     */
    await adminPage.fill('input[name="position"]', '1');
    await adminPage.selectOption('select[name="display_mode"]', 'products_only');

    // Clicking the status and verify the toggle state.
    await adminPage.click('label[for="status"]');
    const toggleInput = await adminPage.locator('input[name="status"]');
    await expect(toggleInput).toBeChecked();

    /**
     * Description And Images Section.
     */
    // Description with TinyMCE. To Do: Need to handle tinymce editor.
    // await adminPage.waitForSelector('.tox-edit-area__iframe');
    // const frame = adminPage.frameLocator('.tox-edit-area__iframe');
    // await frame.locator('body#tinymce').fill('This is a test description');
    // const content = await frame.locator('body#tinymce').textContent();
    // expect(content).toBe('This is a test description');

    // Logo To Do: Need to handle file upload.
    const [fileChooser] = await Promise.all([
        adminPage.waitForEvent('filechooser'),
        adminPage.click('label:has-text("Add Image")')
    ]);
    await fileChooser.setFiles(forms.getRandomImageFile());
    await expect(adminPage.locator('.flex-wrap >> nth=0')).toBeVisible();

    /**
     * SEO Details Section.
     */
    await adminPage.fill('input[name="meta_title"]', 'Test Category - SEO Title');
    await adminPage.fill('input[name="slug"]', concatenatedNames);
    await adminPage.fill('input[name="meta_keywords"]', 'test, category, keywords');
    await adminPage.fill('textarea[name="meta_description"]', 'This is a test meta description');

    /**
     * Filterable Attributes Section.
     */
    const attributes = ['Price', 'Color', 'Size', 'Brand'];

    for (const attr of attributes) {
        await adminPage.click(`label[for="${attr}"]`);

        const checkbox = adminPage.locator(`input[id="${attr}"]`);
        await expect(checkbox).toBeChecked();
    }

    await adminPage.click('button:has-text("Save Category")');

    await expect(adminPage.getByText('Category created successfully.')).toBeVisible();

    /**
     * Assign to the Seller
     */

    const randomID = Date.now();
    const sellerCredentials = {
        name: generateName(),
        shop_title: "Fashion" + randomID,
        title: generateDescription(),
        url: "test"+ randomID,
        email: generateEmail(),
        password: "admin123",
        confirm_password: "admin123",
        description: generateDescription(),
        phone_number: randomID,
        street_address: "California",
        postcode: "90009",
        city: "Caala",
        country: "United States",
        state: "California",
        meta_title: "Meta Title",
        meta_keywords: "Meta Keywords",
        meta_description: "Meta Description",
        privacy_policy: "Privacy Policy",
        shipping_policy: "Shipping Policy",
        return_policy: "Return Policy",
    };
      
        await adminPage.goto('admin/marketplace/sellers');
        await adminPage.getByRole('button', { name: 'Add Sellers' }).click();
        await adminPage.getByRole('textbox', { name: 'Name' }).click();
        await adminPage.getByRole('textbox', { name: 'Name' }).fill(sellerCredentials.name);
        await adminPage.getByRole('textbox', { name: 'Email' }).fill(sellerCredentials.email);
        await adminPage.getByRole('textbox', { name: 'Shop Title' }).fill(sellerCredentials.shop_title);
        await adminPage.getByRole('textbox', { name: 'Shop Url' }).fill(sellerCredentials.url);
        await adminPage.getByRole('textbox', { name: 'Street Address' }).fill(sellerCredentials.street_address);
        await adminPage.getByRole('textbox', { name: 'Phone Number' }).fill(sellerCredentials.phone_number.toString());
        await adminPage.getByRole('textbox', { name: 'Postcode' }).fill(sellerCredentials.postcode);
        await adminPage.getByRole('textbox', { name: 'City' }).fill(sellerCredentials.city);
        await adminPage.selectOption('//select[@name="country"]','IN');
        await adminPage.locator('#state').selectOption('UP');
        await adminPage.getByRole('button', { name: 'Save' }).click();
    
        await expect(adminPage.getByText('Seller Created Successfully.')).toBeVisible();
    
        /**
         *Select the first checkbox in the Seller list
         */
         await adminPage.click('(//label[@class="icon-uncheckbox peer-checked:icon-checked cursor-pointer rounded-md text-2xl peer-checked:text-blue-600"])[1]')
    
         /**
          *Click on the Select Action dropdown
          */
         await adminPage.click('//button[contains(., "Select Action") ]')
     
         /**
          *Hover over the Update Status option
          */
         const updateStatus = await adminPage.locator("xpath=//span[contains(.,'Update Status')]");
         await updateStatus.hover();
     
         /**
          *Click on the second dropdown option
          */
         await adminPage.click("//a[contains(.,'Approved')]");
     
         /**
          *Click on the Agree button
          */
         
         await adminPage.click('//button[contains(.,"Agree")]');
         await expect(adminPage.locator('text=Seller updated successfully!')).toBeVisible();

         await adminPage.goto('admin/marketplace/seller-categories');
         await adminPage.click('a.primary-button');
         await adminPage.locator('#marketplace_seller_id').selectOption('1');

         await adminPage.locator('span.icon-uncheckbox').first().click();

         await adminPage.click('button.primary-button');

         await adminPage.waitForURL('admin/marketplace/seller-categories');
         await expect(adminPage.getByText('Category assigned Successfully.')).toBeVisible();
});