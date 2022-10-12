1. La classe `Book` est-elle conforme au principe **SOLID** ?

*Non car elle brise le principe de Liskov. Le problème : la méthode priceTTC surchargée possède un paramètre supplémentaire obligatoire. Vous pouvez surcharger une méthode dans une classe fille, mais vous devez avoir le même nombre de paramètre(s) que la méthode définie dans la classe mère ainsi que les mêmes types.Vous pouvez cependant ajouter à la méthode surchargée un paramètre/des paramètres faculatif(s), cela ne brise pas le principe de Liskov.*

2. Que se passe-t-il si on ajoute des `Book` à la classe `Cart` et que l'on calcule le total des prix TTC ?

*Une erreur, car il manque un paramètre dans le calcul du prix TTC pour les `Books`.*

3. Quel principe doit-on appliquer pour coder correctement la classe `Book`, si on doit surcharger (re-définir) la méthode `priceTTC()`?

*Le principe de substitution de Liskov.*