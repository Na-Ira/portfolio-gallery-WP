## Portfolio Gallery Custom WordPress Plugin

:white_check_mark: PHP version >= 7.2    
:white_check_mark: Wordpress - 6.1.1  
:white_check_mark: [GLightbox js](https://biati-digital.github.io/glightbox/)       

The plugin must be installed in the WordPress directory `/wp-content/plugins/`.    
In the plugin directory, create a folder `portfolio-gallery` and place the plugin files in it.    
It should be like this: `/wp-content/plugins/portfolio-gallery/`.    

Additionally, you need to install a plugin [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/) and create the following fields:    
:small_orange_diamond:`gallery` (with field type Gallery)    

Under the admin panel Portfolio Gallery you need to create a gallery.      

![Screenshort](/img/screen1.png)    

Create Page or Post and insert the shortcode at the desired location on the page.      

![Screenshort](/img/screen2.png)    

To display the text blocks of the gallery you need to fill in the picture attributes.     
      
![Screenshort](/img/screen3.png)    

Insert the shortcode    

For editor:    
```html
       [portfolio-gallery]
```
   
For .php:    

```html
      <?php echo do_shortcode("[portfolio-gallery]") ?>
```

[View Form](https://folio-ira.nastmobile.com/portfolio-gallery/)
