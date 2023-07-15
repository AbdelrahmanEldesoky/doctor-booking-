(function() {
    var _class = "FormSelect";

    // check env
    if (!window || window[_class]) return;

    // class
    window[_class] = function(parent, options) {
        this._parent = parent;
        this._options = options;
        this._list = document.createElement("ul");
        this._input = null;
        this._select = null;
        this._index = 0;
        this._onClick = this._onClick.bind(this);
        this._onDone = this._onDone.bind(this);
        this._setActive = this._setActive.bind(this);
        this._init();
    };

    // prototype
    window[_class].prototype = {
        constructor: window[_class],

        // init class on a container
        _init: function() {
            if (typeof this._parent === "object") {
                this._input = this._parent.querySelector("input");
                this._select = this._parent.querySelector("select");
                this._index = this._select.selectedIndex || 0;

                if (this._input && this._select) {
                    for (var i = 0; i < this._select.options.length; ++i) {
                        var li = document.createElement("li");
                        li.setAttribute("data-index", i);
                        li.addEventListener("click", this._onClick);
                        li.innerHTML = this._select.options[i].innerHTML || "...";
                        li.className = (this._index === i) ? "active" : "";
                        this._list.appendChild(li);
                    }
                    this._parent.appendChild(this._list);
                    this._setActive();
                }
            }
        },

        // on list item click
        _onClick: function(e) {
            this._index = e.target.getAttribute("data-index") || 0;
            this._setActive(this._index);
            setTimeout(this._onDone, 60);
        },

        // close select menu
        _onDone: function() {
            this._parent.blur();
            this._input.blur();
        },

        // set new active menu item by index
        _setActive: function(index) {
            index = (index || index === 0) ? index : this._select.selectedIndex;

            var active = this._list.querySelector(".active");
            if (active) active.className = "";

            this._select.selectedIndex = index;
            this._input.value = this._select.options[index].innerHTML || "";
            this._list.children[index].className = "active";
        },
    };

})();

/**
 * Usage
 */
var items = document.querySelectorAll("form .select");

for (var i = 0; i < items.length; i++) {
    new FormSelect(items[i]);
}
