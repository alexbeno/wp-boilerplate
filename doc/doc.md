# Alexis Benoliel documentation

- [SASS](#Views)
- [Javascript](#new)

## SASS

- [views](#Views)
- [mixin](#Mixin)
- [Configuration](#configuration)

### Views
##### add Views
1. create a folder or just a file (preceded by a underscore for a file)
2.  go to main.scss
3. import your scss file

### Mixin

##### path to folder
```scss
sources > sass > core > mixin
```
##### win time mixin

###### hover
add hover, active and focus state
```scss
@include hover();
```

###### pseudo element
add basic requirement for pseudo element (content, display, position)
```scss
@include pseudo();
```

###### placeholder
change property of a placeholder
```scss
@include placeholder() {
  ...
}
```

###### flexbox
add basic requirement for flexbox ( display, direction, justify, align )
```scss
@include flex()

@include flex(column, space-around, center);
```

###### button style for a 'a'
add basic requirement for create a button from a 'a' ( display, color, background, width, padding )
```scss
@include abutton()

@include abutton($color: red, $left: 20px);
```scss

###### border
create a border from a div
```scss
@include border()

@include border($w: 50%);
```

###### text
add basic requirement for text ( font, color, size, line height, weight )
```scss
@include txt()

@include txt($size: 50px, $ply: $font-bold)
```scss

##### animation mixin

basic keyframes animation
```scss
@include keyframes(slide-down) {
  0% { opacity: 1; }
  90% { opacity: 0; }
}
```

##### font mixin

em convertion
```scss
@include em(15px)
```


##### media query

###### simple query
basic query with max-width
```scss
@include query($small)

@include query(1440px)
```

###### mobile query
add media query for mobile with different size and orientation
```scss
@include queryMobil(landscape)

@include queryMobil(portrait)
```

###### tablet query
add media query for tablet with different size and orientation
```scss
@include queryTab(landscape)

@include queryTab(portrait)
```


---

### configuration

##### path to folder
```
sources > sass > core > config
```

###### breakpoint
Define your media query breakpoint

###### color
Define your color variable

###### font
Define your font variable

###### transition
Define your transition cubic-bezier variable


## Javascript
### new

* create a folder or just a file (preceded by a underscore for a file)
* in your file code like this

```javascript
class Javascript
{
    /**
     * Constructor
     */
    constructor( options )
    {

    }
}

export default Javascript
```

* go to index.js
* Import your file

```javascript
import Javascript from './Javascript.js'
```

* Call your file

```javascript
let javascript = new Javascript()
```
