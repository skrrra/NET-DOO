TODO

    MODELS

        1. Not finished | Improve eloquent model relationships
        2. Not finished | Check and test the realationships

    CONTROLLERS

        1. Not finished | Create custom requests and validation ( start today )
        2. Not finished | Create ImageUpload model and controller to clean up controllers ( start today )
        3. Not finished | Create ImageDelete model and controller ( can wait )


    VIEWS

        1. Not finished | Transform the prototype into a general layout with components ( can wait )
        2. Not finished | Start creating a Product@create view where the user can ( start today)

                            1. Add multiple categories to the product
                            2. Can select multiple photos for a product ( can wait )
                            3. Can set if the product should be featured on the main page, specific category page ( can wait )  

        3. Not finished | Start creating a Product@edit view where the user can ( start today )

                            1. Can change the name of the product
                            2. Can change the price of the product
                            3. Can change the amount of the product
                            4. Can change the status of the product
                            5. Can change all current categories of a product ( only one or two or all -> maybe some delete icons and add button that contains available categories( view component candidate | alpine ? ))
                            6. Can change the photo ( implement first )
                            7. Can change all photos ( only one or tow or all -> same for the product category change )
                            8. Would be nice if you could set the product as discounted in the edit page ( add it to the DiscountedProduct table ??)

    FACTORIES

        1. Not finished | Create an factory that automaticly selects a random image from available ( start today )

    MIGRATIONS

        1. Not finished | Tied to the model change improve the general structure depending on the model change  ( start today )

    SEEDERS

        1. FINISHED | Create a category database seed chain ( start today )


EXECUTION

    SEEDERS ( DONE )

    Pc's , pc types ( brand name , gaming, polovno )
        1. Gaming pc's ( belongs to pc's and gaming root category), ( list of gaming pc's CategoryController@index + ProductController@show )
        2. Brand name ( belongs to pc's ), ( list of brand names ( more categories that belong to brand name category, CategoryController@show + CategoryController@index + ProductController@show ))
        3. Polovno ( belongs to pc's ), ( can have brand name pc's, gaming pc's CategoryController@show + CategoryController@index + ProductController@show)

        4. Tastature ( belongs to pc's ) ( can have tastature setovi, gaming tastatture, zicane , bezicne , mehanicke SAME CONTORLLER METHODS )
        5. Misevi ( belongs to pc's ) ( can have zicani, bezicni, gaming SAME CONTORLLER METHODS )
        6. Web kamere ( -||- ) 
        7. Headsets ( -||- ) ( gaming , "obicni" )

    Laptops, laptop types ( proffesional, everyday use , gaming ), by screen sizes ( 11, 12.5, 13.3 14, 15.6, 17.3 )
        1. < 13
        2. 13 - 15
        3. 15 +
        4. Polovni

    Tablet ( apple tablets, android tablets, windows tablets )
        1. Apple
        2. Android
        3. Windows
        4. Polovni

    Gaming ( intel, amd type), [ gaming pc's, laptops, mouse, keyboard, chair, keyboard, headsets ]
        1. Pc's
        2. Laptops
        3. Mouse
        4. Keyboard
        5. Chair
        7. Headsets

    Mobiteli ( proizvodzaci samsung, apple, huawei, alcater, lg, )

        1. Smartphones
            1. Apple
            2. Android

        2. Other