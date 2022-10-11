# Chap 1 : SOLID, Introduction


## Présentation du principe SOLID

Les principes **S.O.L.I.D.** permettent de rendre les applications plus modulables, extensibles et testables. Ils régissent la programmation orientée Objet et permettent de construire des Design Patterns (Observer, Decorator, ...) et Framework (comme Symfony par exemple).

Chacune des lettres de l’acronyme **S.O.L.I.D** représente une excellente idée à garder à l’esprit lorsque vous construisez l’architecture de votre système.

Comme tout dans la vie, uti­li­ser ces prin­cipes n’im­porte com­ment peut cau­ser plus de mal que de bien. Ap­pli­quer ces prin­cipes à l’ar­chi­tec­ture d’un pro­gramme peut le rendre plus com­pli­qué qu’il ne de­vrait l’être.

Tout est une questiond d'équilibre. 

## S.O.L.I.D.

* ### **S** comme **Single Responsability**, la responsabilité unique. 
Chaque classe ou fonction doit faire une seule chose, et la faire bien. Elle ne doit avoir qu’une seule raison de changer.

* ### **O** comme **Open/Close**, le principe ouvert/fermé.
Une classe doit être fermée aux modifications afin de ne pas casser le code existant, mais ouverte aux extensions.
Il doit être facile d'ajouter à l'application de nouveaux concepts en étendant les fonctionnalités d'origines et en réutilisant ce qui existe déjà, sans avoir à faire de duplication de code. 

* ### **L** comme **Liskov substitution**, la substitution de Liskov.
Les sous-classes doivent pouvoir faire tout ce que font leurs classes parentes.Si vous remplacez une classe parente par l’une de ses sous-classes, cela ne doit pas casser votre système!

* ### **I** comme Interface segregation, la ségrégation des interfaces.
Cela correspond essentiellement au principe de responsabilité unique, appliqué aux interfaces.
Un objet A ne doit par "consommer" directement un objet B, il doit consommer son interface.
Attention, lorsque vous définissez une interface, celle-ci doit être également **Single Responsability**. Les méthodes définies dans une interface sont des fonctionnalités/responsabilités uniques à implémenter dans la classe. 

Une interface a donc des responsabilités limitées et uniques et bornées.
L'objectif de l'interface segregation est de maintenir un couplage faible entre les classes.

* ### **D** comme Dependency injection, L'inversion des dépendances.
Les classes ne doivent pas créer elles-mêmes les objets dont elles dépendent, on doit les injecter (on crée les instances à l'extérieur de la classe, puis on les "injecte". On ne fait pas de new dans une classe).

Ce principe d'inversion est important, un Container de Services prépare les futures instances des classes que l'on pourra injecter dans les classes consommatrices de ces services. Elles sont "injectées" par une/des méthode(s) de la classe.  