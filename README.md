# mcqExam

MCQ Exam management system using PHP OOP.

## File Structure

1. `assets\` :  all static assets like css, javascript and images
    * `css\` : contains styling files
    * `images\` :  site images
      * `uploads\` :  uploaded images | *Added for `.gitignore`*
    * `js\` :  javascript files
2. `classes\` : all php classes
3. `includes\` : files that runs operations
4. `simplexlsx\` : SimpleXLSX package for `.xlsx` file upload by [Shuchkin](https://github.com/shuchkin/simplexls)

## Classes

file naming: `{class_name}.class.php`

### Short form meanings

> dbh = database handeler
>
> contr = controler model
>
> view = view model

### Class files list

* `dbh.class.php`
* `questioncontr.class.php`
* `questionsetcontr.class.php`
* `questionview.class.php`
* `testcontr.class.php`
* `testview.class.php`
* `topiccontr.class.php`
  