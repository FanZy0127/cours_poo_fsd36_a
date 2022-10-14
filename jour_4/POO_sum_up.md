# POO - Programmation Orientée Objet

C'est un **paradigme** de programmation dans lequel les comportements et les informations sont organisés sous la forme d'**objets** cohérents qui **communiquent** entre eux via :

-> l'appel de **méthodes** (envoie de messages via des fonctions)

-> l'héritage : B est un A **spécifique**

-> la composition : B **a besoin de** / **possède un** A


## Caractéristiques de la POO

### Les classes

Les classes sont un regroupement cohérent de *données* (**propriétés**/**attributs**) et de *comportements* (**méthodes**) servant à définir un concept, ou à représenter quelque chose.
On pourra grâce à celles-ci instancier des **objets** qui bénéficient de ces informations et comportements.

### L'encapsulation

Les classes peuvent décider des informations et comportements qui seront manipulables sur les instances à qui elles donneront naissance.

Il existe 3 modificateurs qui permettent de préciser l'accessibilité d'une propriété ou d'une méthode :

* **public** : Le comportement ou l'information sera manipulable *depuis l'extérieur et l'intérieur de l'instance*.
* **protected** : Le comportement ou l'information sera manipulable *depuis l'intérieur de l'instance, ou dans les instances des classes enfants*.
* **private** : Le comportement ou l'information sera manipulable *uniquement depuis l'intérieur* de l'instance.

### L'héritage

L'héritage permet de créer une classe qui va bénéficier de l'ensemble (voir le nota bene) des informations et comportements d'une autre classe (*parente*/*mère*).
Une classe enfant peut être considérée comme sa classe parente.

* **NOTA BENE** : *On ne peut utiliser que ce qui est **public** ou **protégé**.*

### Abstraction & Polymorphisme

L'abstraction permet de définir des concepts abstraits qui pourront être implémentés par les classes.
Cela permet d'écrire un code qui n'a pas encore connaissance de l'objet qu'il va utiliser en finalité lors de l'exécution.

### Namespaces

Ils permettent d'éviter les collisions qui peuvent être occasionnées lorsque plusieurs classes ont le même nom.
On appelle *nom pleinement qualifié* / *Fully Qualified Class Name* le nom de la classe précédé de son espace de noms.

### Notion de librairie/bibliothèque

C'est un ensemble d'outils (classes et/ou fonctions) utilisables dans nos projets dans le but de répondre à un besoin ou à un objectif recherché.

### Gestionnaire de dépendances 

Une dépendance est une **librairie**/**package** dont le projet a absolument besoin : il en dépend ! Le gestionnaire nous permet d'ajouter, de supprimer, de mettre à jour et d'utiliser facilement ces dépendances.

* **Pour PHP** : **composer**
* **Pour JS**/**Node** : **npm**/**yarn**
* **Pour .Net** : **Nugget**

### Les Design Patterns

Ce sont des solutions d'organisation de votre code pour répondre à des problématiques connues/récurrentes. En 1994, le **Gang of Four** a formalisé **23 patterns** à utiliser dans nos projets.

## Tests 

### Tests Unitaires

C'est un test automatisé dont le but est de s'assurer du bon fonctionnement d'une partie de notre code. Nos tests suivent les étapes "**Given** / **When** / **Then**".

Ils permettent ensuite d'évaluer la couverture du code testé (pourcentage du code couvert par les tests).

### Démarche Test First

On écrit un test complet (**Given** / **When** / **Then**), puis à la suite de ça, on implémente le code.

### Démarche TDD 

On écrit le test, et durant la rédaction même du test, on implémente le code à chaque fois que cela est nécessaire.

1) On ne peut pas écire du code de production si on n'a pas un test défectueux au préalable.
2) Dès qu'un test est défectueux, on écrit le minimum de code possible pour le corriger.
3) On n'a pas le droit d'écrire plus de code de production que ce que les tests nous demandent.


## Principes S.O.L.I.D

Ce sont les 5 principes pour améliorer la qualité d'un code orienté objet.
Ces principes ont été popularisés en 2000 par Robert C. Martin (Uncle Bob).

### Single Responsibility Principle

Une classe ou une méthode ne doit avoir qu'une seule responsabilité (mission).

"*Une classe ne devrait avoir qu'une seule raison de changer.*"

### Open/Closed Principle

Open for extension / Closed for modification.

-> On ne devrait pas modifier une classe qui est déjà "en place" (utilisée ailleurs, testée). On devrait plutôt créer une nouvelle classe qui hérite, en modifiant ce que l'on souhaite modifier.

"*On devrait pouvoir faire évoluer le comportement d'une classe sans avoir à la modifier.*"

### Liskov Substitution Principle

"*Quand une fonction utilise un objet de la classe A, elle doit pouvoir utiliser un objet de la classe B qui hérite de A sans problème.*"

Lorsque l'on définit une méthode de la classe B, elle doit au moins conserver la même signature que dans la classe A.
 Il faut également prendre en compte :

* **La contravariance des paramètres** : dans les paramètres de la fonction d'un enfant, on peut demander plus générique que le parent, mais on ne peut pas demander plus spécifique qu'un parent.
* **La covariance des retours** : dans les retours, on peut retourner des éléments plus spécifiques.

### Interface Segregation Principle

Les interfaces que l'on écrit ne devraient contenir que le strict nécessaire, et ne pas mélanger les responsabilités afin que les classes qui les implémentent puissent respecter le Single Responsibility Principle.

"*Aucune classe ne devrait être forcée d'implémenter une méthode dont elle n'a pas besoin.*"

### Dependency Inversion Principle

"*On devrait toujours dépendre d'abstractions plutôt que d'implémentations.*"

Ce principe vise à renforcer le découplage des classes (ou modules), car si une classe dépend d'une abstraction, on peut alors lui soumettre n'importe quelle implémentation, du moment que cette dernière respecte l'abstraction en question.
