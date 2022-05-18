(this["webpackJsonptrevor"] = this["webpackJsonptrevor"] || []).push([[2],[
/* 0 */
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


if (true) {
  module.exports = __webpack_require__(41);
} else {}

/***/ }),
/* 2 */,
/* 3 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return _classCallCheck; });
function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

/***/ }),
/* 4 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return _createClass; });
function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

/***/ }),
/* 5 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXPORTS
__webpack_require__.d(__webpack_exports__, "a", function() { return /* binding */ _createSuper; });

// CONCATENATED MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/getPrototypeOf.js
function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}
// CONCATENATED MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/isNativeReflectConstruct.js
function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}
// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/typeof.js
var esm_typeof = __webpack_require__(15);

// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/assertThisInitialized.js
var assertThisInitialized = __webpack_require__(11);

// CONCATENATED MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/possibleConstructorReturn.js


function _possibleConstructorReturn(self, call) {
  if (call && (Object(esm_typeof["a" /* default */])(call) === "object" || typeof call === "function")) {
    return call;
  }

  return Object(assertThisInitialized["a" /* default */])(self);
}
// CONCATENATED MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/createSuper.js



function _createSuper(Derived) {
  return function () {
    var Super = _getPrototypeOf(Derived),
        result;

    if (_isNativeReflectConstruct()) {
      var NewTarget = _getPrototypeOf(this).constructor;
      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

/***/ }),
/* 6 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXPORTS
__webpack_require__.d(__webpack_exports__, "a", function() { return /* binding */ _inherits; });

// CONCATENATED MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js
function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}
// CONCATENATED MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/inherits.js

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

/***/ }),
/* 7 */,
/* 8 */
/***/ (function(module, exports) {

module.exports = wp.components;

/***/ }),
/* 9 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return _objectSpread2; });
/* harmony import */ var _defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(12);


function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) symbols = symbols.filter(function (sym) {
      return Object.getOwnPropertyDescriptor(object, sym).enumerable;
    });
    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread2(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(Object(source), true).forEach(function (key) {
        Object(_defineProperty__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(Object(source)).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

/***/ }),
/* 10 */,
/* 11 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return _assertThisInitialized; });
function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

/***/ }),
/* 12 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return _defineProperty; });
function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

/***/ }),
/* 13 */,
/* 14 */
/***/ (function(module, exports) {

module.exports = wp.blockEditor;

/***/ }),
/* 15 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return _typeof; });
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

/***/ }),
/* 16 */,
/* 17 */,
/* 18 */,
/* 19 */
/***/ (function(module, exports) {

module.exports = wp.hooks;

/***/ }),
/* 20 */,
/* 21 */
/***/ (function(module, exports) {

var g; // This works in non-strict mode

g = function () {
  return this;
}();

try {
  // This works if eval is allowed (see CSP)
  g = g || new Function("return this")();
} catch (e) {
  // This works if the window reference is available
  if (typeof window === "object") g = window;
} // g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}


module.exports = g;

/***/ }),
/* 22 */,
/* 23 */,
/* 24 */,
/* 25 */
/***/ (function(module, exports) {

module.exports = wp.data;

/***/ }),
/* 26 */,
/* 27 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXPORTS
__webpack_require__.d(__webpack_exports__, "notices", function() { return /* reexport */ notices; });
__webpack_require__.d(__webpack_exports__, "htmlDecode", function() { return /* reexport */ htmlDecode; });
__webpack_require__.d(__webpack_exports__, "mediaHostnameFix", function() { return /* reexport */ mediaHostnameFix; });
__webpack_require__.d(__webpack_exports__, "copyToClipboard", function() { return /* reexport */ copyToClipboard; });

// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/classCallCheck.js
var classCallCheck = __webpack_require__(3);

// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/createClass.js
var createClass = __webpack_require__(4);

// EXTERNAL MODULE: external "jQuery"
var external_jQuery_ = __webpack_require__(0);
var external_jQuery_default = /*#__PURE__*/__webpack_require__.n(external_jQuery_);

// CONCATENATED MODULE: ./src/plugin/js/main/utils/notices.js



/* harmony default export */ var notices = (new ( /*#__PURE__*/function () {
  function _class() {
    Object(classCallCheck["a" /* default */])(this, _class);
  }

  Object(createClass["a" /* default */])(_class, [{
    key: "_insert$elem",

    /**
     * Returns page title as a jQuery object.
     *
     * @private
     */
    value: function _insert$elem($elem) {
      $elem.insertAfter(external_jQuery_default()('h1').first());
    }
    /**
     * Creates a notice container.
     *
     * @param {string} elem_class - Element class.
     * @param {string} context - Message to show.
     * @returns {string} html
     * @private
     */

  }, {
    key: "_getContainer",
    value: function _getContainer(elem_class, context) {
      return "<div class=\"notice ".concat(elem_class, " below-h1\">\n                    <p>").concat(context, "</p>\n                </div>");
    }
    /**
     * Makes the notice dismissible.
     *
     * @param {jQuery} $elem - jQuery object.
     * @private
     */

  }, {
    key: "_makeDismissible",
    value: function _makeDismissible($elem) {
      $elem.addClass('is-dismissible');
      var $button = external_jQuery_default()("<button type=\"button\" class=\"notice-dismiss\"><span class=\"screen-reader-text\"></span></button>");
      var btnText = 'Dismiss';
      $button.find('.screen-reader-text').text(btnText);
      $elem.append($button);
      $button.on('click.wp-dismiss-notice', function (e) {
        e.preventDefault();
        $elem.fadeTo(100, 0, function () {
          external_jQuery_default()(this).slideUp(100, function () {
            external_jQuery_default()(this).remove();
          });
        });
      });
    }
    /**
     * Create and add custom notice.
     *
     * @param {string} context
     * @param {Object} [args]
     * @param {string} args.class
     * @param {bool} args.dismissible
     * @param {bool} args.animateIn
     * @param {bool} args.clear
     * @param {bool} args.scrollTop
     * @returns {jQuery}
     */

  }, {
    key: "add",
    value: function add(context) {
      var args = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      args = Object.assign({
        class: 'updated',
        dismissible: true,
        animateIn: true,
        clear: true,
        scrollTop: true
      }, args); // Clear previous

      if (args.clear) this.clear();
      var $elem = external_jQuery_default()(this._getContainer(args.class, context));
      if (args.dismissible) this._makeDismissible($elem);

      this._insert$elem($elem.hide());

      if (args.animateIn) $elem.fadeIn(1000);else $elem.show();
      if (args.scrollTop) external_jQuery_default()('body, html').animate({
        scrollTop: 0
      }, 600);
      return $elem;
    }
  }, {
    key: "updateContext",
    value: function updateContext($elem, context) {
      if (external_jQuery_default.a.contains(document.documentElement, $elem[0])) {
        // If $elem in the dom then just update the context
        $elem.first('p').html("<p>".concat(context, "</p>"));
      } else {
        // $elem is not in dom, then add the new one
        var cls = $elem && $elem.hasClass('error') ? 'error' : 'updated';
        this.add(context, {
          class: cls
        });
      }
    }
    /**
     * Add error notice.
     *
     * @param {string} context
     * @param {Object} args
     * @returns {jQuery}
     */

  }, {
    key: "addError",
    value: function addError(context) {
      var args = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      return this.add(context, Object.assign({
        class: 'error'
      }, args));
    }
    /**
     * Add update notice.
     *
     * @param {string} context
     * @param {Object} args
     * @returns {jQuery}
     */

  }, {
    key: "addUpdate",
    value: function addUpdate(context) {
      var args = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      return this.add(context, Object.assign({
        class: 'updated'
      }, args));
    }
    /**
     * Clears all notice messages.
     */

  }, {
    key: "clear",
    value: function clear() {
      external_jQuery_default()('.notice.error.below-h1,.notice.updated.below-h1').hide(400, function () {
        external_jQuery_default()(this).remove();
      });
    }
  }]);

  return _class;
}())());
// CONCATENATED MODULE: ./src/plugin/js/main/utils/html-decode.js
function htmlDecode(input) {
  var doc = new DOMParser().parseFromString(input, "text/html");
  return doc.documentElement.textContent;
}
// CONCATENATED MODULE: ./src/plugin/js/main/utils/media-hostname-fix.js
/**
 * If image hosts are different converts it to current host.
 *
 * @param img
 * @returns {{url}|*}
 */
function mediaHostnameFix(img) {
  if (!img || !img.url) {
    return img;
  }

  var url = new URL(img.url);

  if (url.host === window.location.host) {
    return img;
  }
  /* Changing only the host is not working... */


  url.hostname = window.location.hostname;
  url.protocol = window.location.protocol;
  url.port = window.location.port;
  img.url = url.toString();
  return img;
}
// CONCATENATED MODULE: ./src/plugin/js/main/utils/copy-to-clipboard.js
// https://stackoverflow.com/a/46118025
function copyToClipboard(text) {
  var dummy = document.createElement('input'); // to avoid breaking orgain page when copying more words
  // cant copy when adding below this code
  // dummy.style.display = 'none'

  document.body.appendChild(dummy); //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard

  dummy.value = text.trim(); // source: https://stackoverflow.com/a/47880284

  var selection = document.getSelection();
  var range = document.createRange();
  range.selectNode(dummy);
  selection.removeAllRanges();
  selection.addRange(range);
  document.execCommand('copy');
  selection.removeAllRanges();
  document.body.removeChild(dummy);
}
// CONCATENATED MODULE: ./src/plugin/js/main/utils/index.js









/***/ }),
/* 28 */,
/* 29 */
/***/ (function(module, exports) {

module.exports = wp.compose;

/***/ }),
/* 30 */
/***/ (function(module, exports) {

module.exports = wp.blocks;

/***/ }),
/* 31 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/

/* eslint-disable no-unused-vars */

var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
  if (val === null || val === undefined) {
    throw new TypeError('Object.assign cannot be called with null or undefined');
  }

  return Object(val);
}

function shouldUseNative() {
  try {
    if (!Object.assign) {
      return false;
    } // Detect buggy property enumeration order in older V8 versions.
    // https://bugs.chromium.org/p/v8/issues/detail?id=4118


    var test1 = new String('abc'); // eslint-disable-line no-new-wrappers

    test1[5] = 'de';

    if (Object.getOwnPropertyNames(test1)[0] === '5') {
      return false;
    } // https://bugs.chromium.org/p/v8/issues/detail?id=3056


    var test2 = {};

    for (var i = 0; i < 10; i++) {
      test2['_' + String.fromCharCode(i)] = i;
    }

    var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
      return test2[n];
    });

    if (order2.join('') !== '0123456789') {
      return false;
    } // https://bugs.chromium.org/p/v8/issues/detail?id=3056


    var test3 = {};
    'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
      test3[letter] = letter;
    });

    if (Object.keys(Object.assign({}, test3)).join('') !== 'abcdefghijklmnopqrst') {
      return false;
    }

    return true;
  } catch (err) {
    // We don't expect any of the above to throw, but better to be safe.
    return false;
  }
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
  var from;
  var to = toObject(target);
  var symbols;

  for (var s = 1; s < arguments.length; s++) {
    from = Object(arguments[s]);

    for (var key in from) {
      if (hasOwnProperty.call(from, key)) {
        to[key] = from[key];
      }
    }

    if (getOwnPropertySymbols) {
      symbols = getOwnPropertySymbols(from);

      for (var i = 0; i < symbols.length; i++) {
        if (propIsEnumerable.call(from, symbols[i])) {
          to[symbols[i]] = from[symbols[i]];
        }
      }
    }
  }

  return to;
};

/***/ }),
/* 32 */,
/* 33 */,
/* 34 */,
/* 35 */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(36);
/** Built-in value references. */


var Symbol = root.Symbol;
module.exports = Symbol;

/***/ }),
/* 36 */
/***/ (function(module, exports, __webpack_require__) {

var freeGlobal = __webpack_require__(66);
/** Detect free variable `self`. */


var freeSelf = typeof self == 'object' && self && self.Object === Object && self;
/** Used as a reference to the global object. */

var root = freeGlobal || freeSelf || Function('return this')();
module.exports = root;

/***/ }),
/* 37 */
/***/ (function(module, exports) {

/**
 * Checks if `value` is the
 * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
 * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an object, else `false`.
 * @example
 *
 * _.isObject({});
 * // => true
 *
 * _.isObject([1, 2, 3]);
 * // => true
 *
 * _.isObject(_.noop);
 * // => true
 *
 * _.isObject(null);
 * // => false
 */
function isObject(value) {
  var type = typeof value;
  return value != null && (type == 'object' || type == 'function');
}

module.exports = isObject;

/***/ }),
/* 38 */,
/* 39 */,
/* 40 */,
/* 41 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/** @license React v16.14.0
 * react.production.min.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */


var l = __webpack_require__(31),
    n = "function" === typeof Symbol && Symbol.for,
    p = n ? Symbol.for("react.element") : 60103,
    q = n ? Symbol.for("react.portal") : 60106,
    r = n ? Symbol.for("react.fragment") : 60107,
    t = n ? Symbol.for("react.strict_mode") : 60108,
    u = n ? Symbol.for("react.profiler") : 60114,
    v = n ? Symbol.for("react.provider") : 60109,
    w = n ? Symbol.for("react.context") : 60110,
    x = n ? Symbol.for("react.forward_ref") : 60112,
    y = n ? Symbol.for("react.suspense") : 60113,
    z = n ? Symbol.for("react.memo") : 60115,
    A = n ? Symbol.for("react.lazy") : 60116,
    B = "function" === typeof Symbol && Symbol.iterator;

function C(a) {
  for (var b = "https://reactjs.org/docs/error-decoder.html?invariant=" + a, c = 1; c < arguments.length; c++) {
    b += "&args[]=" + encodeURIComponent(arguments[c]);
  }

  return "Minified React error #" + a + "; visit " + b + " for the full message or use the non-minified dev environment for full errors and additional helpful warnings.";
}

var D = {
  isMounted: function isMounted() {
    return !1;
  },
  enqueueForceUpdate: function enqueueForceUpdate() {},
  enqueueReplaceState: function enqueueReplaceState() {},
  enqueueSetState: function enqueueSetState() {}
},
    E = {};

function F(a, b, c) {
  this.props = a;
  this.context = b;
  this.refs = E;
  this.updater = c || D;
}

F.prototype.isReactComponent = {};

F.prototype.setState = function (a, b) {
  if ("object" !== typeof a && "function" !== typeof a && null != a) throw Error(C(85));
  this.updater.enqueueSetState(this, a, b, "setState");
};

F.prototype.forceUpdate = function (a) {
  this.updater.enqueueForceUpdate(this, a, "forceUpdate");
};

function G() {}

G.prototype = F.prototype;

function H(a, b, c) {
  this.props = a;
  this.context = b;
  this.refs = E;
  this.updater = c || D;
}

var I = H.prototype = new G();
I.constructor = H;
l(I, F.prototype);
I.isPureReactComponent = !0;
var J = {
  current: null
},
    K = Object.prototype.hasOwnProperty,
    L = {
  key: !0,
  ref: !0,
  __self: !0,
  __source: !0
};

function M(a, b, c) {
  var e,
      d = {},
      g = null,
      k = null;
  if (null != b) for (e in void 0 !== b.ref && (k = b.ref), void 0 !== b.key && (g = "" + b.key), b) {
    K.call(b, e) && !L.hasOwnProperty(e) && (d[e] = b[e]);
  }
  var f = arguments.length - 2;
  if (1 === f) d.children = c;else if (1 < f) {
    for (var h = Array(f), m = 0; m < f; m++) {
      h[m] = arguments[m + 2];
    }

    d.children = h;
  }
  if (a && a.defaultProps) for (e in f = a.defaultProps, f) {
    void 0 === d[e] && (d[e] = f[e]);
  }
  return {
    $$typeof: p,
    type: a,
    key: g,
    ref: k,
    props: d,
    _owner: J.current
  };
}

function N(a, b) {
  return {
    $$typeof: p,
    type: a.type,
    key: b,
    ref: a.ref,
    props: a.props,
    _owner: a._owner
  };
}

function O(a) {
  return "object" === typeof a && null !== a && a.$$typeof === p;
}

function escape(a) {
  var b = {
    "=": "=0",
    ":": "=2"
  };
  return "$" + ("" + a).replace(/[=:]/g, function (a) {
    return b[a];
  });
}

var P = /\/+/g,
    Q = [];

function R(a, b, c, e) {
  if (Q.length) {
    var d = Q.pop();
    d.result = a;
    d.keyPrefix = b;
    d.func = c;
    d.context = e;
    d.count = 0;
    return d;
  }

  return {
    result: a,
    keyPrefix: b,
    func: c,
    context: e,
    count: 0
  };
}

function S(a) {
  a.result = null;
  a.keyPrefix = null;
  a.func = null;
  a.context = null;
  a.count = 0;
  10 > Q.length && Q.push(a);
}

function T(a, b, c, e) {
  var d = typeof a;
  if ("undefined" === d || "boolean" === d) a = null;
  var g = !1;
  if (null === a) g = !0;else switch (d) {
    case "string":
    case "number":
      g = !0;
      break;

    case "object":
      switch (a.$$typeof) {
        case p:
        case q:
          g = !0;
      }

  }
  if (g) return c(e, a, "" === b ? "." + U(a, 0) : b), 1;
  g = 0;
  b = "" === b ? "." : b + ":";
  if (Array.isArray(a)) for (var k = 0; k < a.length; k++) {
    d = a[k];
    var f = b + U(d, k);
    g += T(d, f, c, e);
  } else if (null === a || "object" !== typeof a ? f = null : (f = B && a[B] || a["@@iterator"], f = "function" === typeof f ? f : null), "function" === typeof f) for (a = f.call(a), k = 0; !(d = a.next()).done;) {
    d = d.value, f = b + U(d, k++), g += T(d, f, c, e);
  } else if ("object" === d) throw c = "" + a, Error(C(31, "[object Object]" === c ? "object with keys {" + Object.keys(a).join(", ") + "}" : c, ""));
  return g;
}

function V(a, b, c) {
  return null == a ? 0 : T(a, "", b, c);
}

function U(a, b) {
  return "object" === typeof a && null !== a && null != a.key ? escape(a.key) : b.toString(36);
}

function W(a, b) {
  a.func.call(a.context, b, a.count++);
}

function aa(a, b, c) {
  var e = a.result,
      d = a.keyPrefix;
  a = a.func.call(a.context, b, a.count++);
  Array.isArray(a) ? X(a, e, c, function (a) {
    return a;
  }) : null != a && (O(a) && (a = N(a, d + (!a.key || b && b.key === a.key ? "" : ("" + a.key).replace(P, "$&/") + "/") + c)), e.push(a));
}

function X(a, b, c, e, d) {
  var g = "";
  null != c && (g = ("" + c).replace(P, "$&/") + "/");
  b = R(b, g, e, d);
  V(a, aa, b);
  S(b);
}

var Y = {
  current: null
};

function Z() {
  var a = Y.current;
  if (null === a) throw Error(C(321));
  return a;
}

var ba = {
  ReactCurrentDispatcher: Y,
  ReactCurrentBatchConfig: {
    suspense: null
  },
  ReactCurrentOwner: J,
  IsSomeRendererActing: {
    current: !1
  },
  assign: l
};
exports.Children = {
  map: function map(a, b, c) {
    if (null == a) return a;
    var e = [];
    X(a, e, null, b, c);
    return e;
  },
  forEach: function forEach(a, b, c) {
    if (null == a) return a;
    b = R(null, null, b, c);
    V(a, W, b);
    S(b);
  },
  count: function count(a) {
    return V(a, function () {
      return null;
    }, null);
  },
  toArray: function toArray(a) {
    var b = [];
    X(a, b, null, function (a) {
      return a;
    });
    return b;
  },
  only: function only(a) {
    if (!O(a)) throw Error(C(143));
    return a;
  }
};
exports.Component = F;
exports.Fragment = r;
exports.Profiler = u;
exports.PureComponent = H;
exports.StrictMode = t;
exports.Suspense = y;
exports.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED = ba;

exports.cloneElement = function (a, b, c) {
  if (null === a || void 0 === a) throw Error(C(267, a));
  var e = l({}, a.props),
      d = a.key,
      g = a.ref,
      k = a._owner;

  if (null != b) {
    void 0 !== b.ref && (g = b.ref, k = J.current);
    void 0 !== b.key && (d = "" + b.key);
    if (a.type && a.type.defaultProps) var f = a.type.defaultProps;

    for (h in b) {
      K.call(b, h) && !L.hasOwnProperty(h) && (e[h] = void 0 === b[h] && void 0 !== f ? f[h] : b[h]);
    }
  }

  var h = arguments.length - 2;
  if (1 === h) e.children = c;else if (1 < h) {
    f = Array(h);

    for (var m = 0; m < h; m++) {
      f[m] = arguments[m + 2];
    }

    e.children = f;
  }
  return {
    $$typeof: p,
    type: a.type,
    key: d,
    ref: g,
    props: e,
    _owner: k
  };
};

exports.createContext = function (a, b) {
  void 0 === b && (b = null);
  a = {
    $$typeof: w,
    _calculateChangedBits: b,
    _currentValue: a,
    _currentValue2: a,
    _threadCount: 0,
    Provider: null,
    Consumer: null
  };
  a.Provider = {
    $$typeof: v,
    _context: a
  };
  return a.Consumer = a;
};

exports.createElement = M;

exports.createFactory = function (a) {
  var b = M.bind(null, a);
  b.type = a;
  return b;
};

exports.createRef = function () {
  return {
    current: null
  };
};

exports.forwardRef = function (a) {
  return {
    $$typeof: x,
    render: a
  };
};

exports.isValidElement = O;

exports.lazy = function (a) {
  return {
    $$typeof: A,
    _ctor: a,
    _status: -1,
    _result: null
  };
};

exports.memo = function (a, b) {
  return {
    $$typeof: z,
    type: a,
    compare: void 0 === b ? null : b
  };
};

exports.useCallback = function (a, b) {
  return Z().useCallback(a, b);
};

exports.useContext = function (a, b) {
  return Z().useContext(a, b);
};

exports.useDebugValue = function () {};

exports.useEffect = function (a, b) {
  return Z().useEffect(a, b);
};

exports.useImperativeHandle = function (a, b, c) {
  return Z().useImperativeHandle(a, b, c);
};

exports.useLayoutEffect = function (a, b) {
  return Z().useLayoutEffect(a, b);
};

exports.useMemo = function (a, b) {
  return Z().useMemo(a, b);
};

exports.useReducer = function (a, b, c) {
  return Z().useReducer(a, b, c);
};

exports.useRef = function (a) {
  return Z().useRef(a);
};

exports.useState = function (a) {
  return Z().useState(a);
};

exports.version = "16.14.0";

/***/ }),
/* 42 */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(43),
    isObjectLike = __webpack_require__(44);
/** `Object#toString` result references. */


var symbolTag = '[object Symbol]';
/**
 * Checks if `value` is classified as a `Symbol` primitive or object.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
 * @example
 *
 * _.isSymbol(Symbol.iterator);
 * // => true
 *
 * _.isSymbol('abc');
 * // => false
 */

function isSymbol(value) {
  return typeof value == 'symbol' || isObjectLike(value) && baseGetTag(value) == symbolTag;
}

module.exports = isSymbol;

/***/ }),
/* 43 */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(35),
    getRawTag = __webpack_require__(67),
    objectToString = __webpack_require__(68);
/** `Object#toString` result references. */


var nullTag = '[object Null]',
    undefinedTag = '[object Undefined]';
/** Built-in value references. */

var symToStringTag = Symbol ? Symbol.toStringTag : undefined;
/**
 * The base implementation of `getTag` without fallbacks for buggy environments.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the `toStringTag`.
 */

function baseGetTag(value) {
  if (value == null) {
    return value === undefined ? undefinedTag : nullTag;
  }

  return symToStringTag && symToStringTag in Object(value) ? getRawTag(value) : objectToString(value);
}

module.exports = baseGetTag;

/***/ }),
/* 44 */
/***/ (function(module, exports) {

/**
 * Checks if `value` is object-like. A value is object-like if it's not `null`
 * and has a `typeof` result of "object".
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
 * @example
 *
 * _.isObjectLike({});
 * // => true
 *
 * _.isObjectLike([1, 2, 3]);
 * // => true
 *
 * _.isObjectLike(_.noop);
 * // => false
 *
 * _.isObjectLike(null);
 * // => false
 */
function isObjectLike(value) {
  return value != null && typeof value == 'object';
}

module.exports = isObjectLike;

/***/ }),
/* 45 */,
/* 46 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return _objectDestructuringEmpty; });
function _objectDestructuringEmpty(obj) {
  if (obj == null) throw new TypeError("Cannot destructure undefined");
}

/***/ }),
/* 47 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_objectSpread2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(9);

/* harmony default export */ __webpack_exports__["a"] = (function () {
  var collectionName = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'Posts';

  var _apiOptions = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

  var context = arguments.length > 2 ? arguments[2] : undefined;
  return function (_ref, response) {
    var search = _ref.term;
    var apiOptions = typeof _apiOptions === 'function' ? _apiOptions.apply(context) // call the lazy function
    : _apiOptions; // Update filters

    apiOptions.filter = apiOptions.filter || {};

    if (typeof apiOptions.filter.nopaging === 'undefined') {
      apiOptions.filter.nopaging = true;
    }

    var col = new wp.api.collections[collectionName]();
    col.fetch({
      data: Object(_app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_objectSpread2__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
        search: search
      }, apiOptions)
    }).then(function (results) {
      if ('date' in col.args) {
        return postProcessor(results, response);
      } else {
        return termProcessor(results, response);
      }
    }, function () {
      return response();
    });
  };
});

function postProcessor(results, response) {
  response(results.map(function (post) {
    return {
      label: post.title.rendered || "#".concat(post.id),
      value: post.id
    };
  }));
}

function termProcessor(results, response) {
  response(results.map(function (term) {
    return {
      label: term.name || "#".concat(term.id),
      value: term.id
    };
  }));
}

/***/ }),
/* 48 */,
/* 49 */
/***/ (function(module, exports) {

/**
 * Checks if `value` is classified as an `Array` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an array, else `false`.
 * @example
 *
 * _.isArray([1, 2, 3]);
 * // => true
 *
 * _.isArray(document.body.children);
 * // => false
 *
 * _.isArray('abc');
 * // => false
 *
 * _.isArray(_.noop);
 * // => false
 */
var isArray = Array.isArray;
module.exports = isArray;

/***/ }),
/* 50 */
/***/ (function(module, exports, __webpack_require__) {

var getNative = __webpack_require__(75);
/* Built-in method references that are verified to be native. */


var nativeCreate = getNative(Object, 'create');
module.exports = nativeCreate;

/***/ }),
/* 51 */
/***/ (function(module, exports, __webpack_require__) {

var eq = __webpack_require__(264);
/**
 * Gets the index at which the `key` is found in `array` of key-value pairs.
 *
 * @private
 * @param {Array} array The array to inspect.
 * @param {*} key The key to search for.
 * @returns {number} Returns the index of the matched value, else `-1`.
 */


function assocIndexOf(array, key) {
  var length = array.length;

  while (length--) {
    if (eq(array[length][0], key)) {
      return length;
    }
  }

  return -1;
}

module.exports = assocIndexOf;

/***/ }),
/* 52 */
/***/ (function(module, exports, __webpack_require__) {

var isKeyable = __webpack_require__(270);
/**
 * Gets the data for `map`.
 *
 * @private
 * @param {Object} map The map to query.
 * @param {string} key The reference key.
 * @returns {*} Returns the map data.
 */


function getMapData(map, key) {
  var data = map.__data__;
  return isKeyable(key) ? data[typeof key == 'string' ? 'string' : 'hash'] : data.map;
}

module.exports = getMapData;

/***/ }),
/* 53 */,
/* 54 */,
/* 55 */,
/* 56 */,
/* 57 */,
/* 58 */,
/* 59 */
/***/ (function(module, exports) {

module.exports = wp.editPost;

/***/ }),
/* 60 */,
/* 61 */,
/* 62 */,
/* 63 */,
/* 64 */,
/* 65 */,
/* 66 */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {/** Detect free variable `global` from Node.js. */
var freeGlobal = typeof global == 'object' && global && global.Object === Object && global;
module.exports = freeGlobal;
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(21)))

/***/ }),
/* 67 */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(35);
/** Used for built-in method references. */


var objectProto = Object.prototype;
/** Used to check objects for own properties. */

var hasOwnProperty = objectProto.hasOwnProperty;
/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */

var nativeObjectToString = objectProto.toString;
/** Built-in value references. */

var symToStringTag = Symbol ? Symbol.toStringTag : undefined;
/**
 * A specialized version of `baseGetTag` which ignores `Symbol.toStringTag` values.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the raw `toStringTag`.
 */

function getRawTag(value) {
  var isOwn = hasOwnProperty.call(value, symToStringTag),
      tag = value[symToStringTag];

  try {
    value[symToStringTag] = undefined;
    var unmasked = true;
  } catch (e) {}

  var result = nativeObjectToString.call(value);

  if (unmasked) {
    if (isOwn) {
      value[symToStringTag] = tag;
    } else {
      delete value[symToStringTag];
    }
  }

  return result;
}

module.exports = getRawTag;

/***/ }),
/* 68 */
/***/ (function(module, exports) {

/** Used for built-in method references. */
var objectProto = Object.prototype;
/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */

var nativeObjectToString = objectProto.toString;
/**
 * Converts `value` to a string using `Object.prototype.toString`.
 *
 * @private
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 */

function objectToString(value) {
  return nativeObjectToString.call(value);
}

module.exports = objectToString;

/***/ }),
/* 69 */,
/* 70 */,
/* 71 */,
/* 72 */,
/* 73 */
/***/ (function(module, exports, __webpack_require__) {

var baseHas = __webpack_require__(240),
    hasPath = __webpack_require__(241);
/**
 * Checks if `path` is a direct property of `object`.
 *
 * @static
 * @since 0.1.0
 * @memberOf _
 * @category Object
 * @param {Object} object The object to query.
 * @param {Array|string} path The path to check.
 * @returns {boolean} Returns `true` if `path` exists, else `false`.
 * @example
 *
 * var object = { 'a': { 'b': 2 } };
 * var other = _.create({ 'a': _.create({ 'b': 2 }) });
 *
 * _.has(object, 'a');
 * // => true
 *
 * _.has(object, 'a.b');
 * // => true
 *
 * _.has(object, ['a', 'b']);
 * // => true
 *
 * _.has(other, 'a');
 * // => false
 */


function has(object, path) {
  return object != null && hasPath(object, path, baseHas);
}

module.exports = has;

/***/ }),
/* 74 */,
/* 75 */
/***/ (function(module, exports, __webpack_require__) {

var baseIsNative = __webpack_require__(251),
    getValue = __webpack_require__(256);
/**
 * Gets the native function at `key` of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {string} key The key of the method to get.
 * @returns {*} Returns the function if it's native, else `undefined`.
 */


function getNative(object, key) {
  var value = getValue(object, key);
  return baseIsNative(value) ? value : undefined;
}

module.exports = getNative;

/***/ }),
/* 76 */,
/* 77 */,
/* 78 */,
/* 79 */,
/* 80 */,
/* 81 */,
/* 82 */,
/* 83 */,
/* 84 */,
/* 85 */,
/* 86 */,
/* 87 */,
/* 88 */,
/* 89 */,
/* 90 */,
/* 91 */,
/* 92 */,
/* 93 */,
/* 94 */,
/* 95 */,
/* 96 */,
/* 97 */,
/* 98 */,
/* 99 */,
/* 100 */,
/* 101 */,
/* 102 */,
/* 103 */,
/* 104 */,
/* 105 */,
/* 106 */,
/* 107 */,
/* 108 */,
/* 109 */,
/* 110 */,
/* 111 */,
/* 112 */,
/* 113 */,
/* 114 */,
/* 115 */,
/* 116 */,
/* 117 */,
/* 118 */,
/* 119 */,
/* 120 */,
/* 121 */,
/* 122 */,
/* 123 */,
/* 124 */,
/* 125 */,
/* 126 */,
/* 127 */,
/* 128 */,
/* 129 */,
/* 130 */,
/* 131 */,
/* 132 */,
/* 133 */,
/* 134 */,
/* 135 */,
/* 136 */,
/* 137 */,
/* 138 */,
/* 139 */,
/* 140 */,
/* 141 */,
/* 142 */,
/* 143 */,
/* 144 */,
/* 145 */,
/* 146 */,
/* 147 */,
/* 148 */,
/* 149 */,
/* 150 */,
/* 151 */,
/* 152 */,
/* 153 */,
/* 154 */,
/* 155 */,
/* 156 */,
/* 157 */,
/* 158 */,
/* 159 */,
/* 160 */,
/* 161 */,
/* 162 */,
/* 163 */,
/* 164 */,
/* 165 */,
/* 166 */,
/* 167 */,
/* 168 */,
/* 169 */,
/* 170 */,
/* 171 */,
/* 172 */,
/* 173 */,
/* 174 */,
/* 175 */,
/* 176 */,
/* 177 */,
/* 178 */,
/* 179 */,
/* 180 */,
/* 181 */,
/* 182 */,
/* 183 */,
/* 184 */,
/* 185 */,
/* 186 */,
/* 187 */,
/* 188 */,
/* 189 */,
/* 190 */,
/* 191 */,
/* 192 */,
/* 193 */,
/* 194 */,
/* 195 */,
/* 196 */,
/* 197 */,
/* 198 */,
/* 199 */,
/* 200 */,
/* 201 */,
/* 202 */,
/* 203 */,
/* 204 */,
/* 205 */,
/* 206 */,
/* 207 */,
/* 208 */,
/* 209 */,
/* 210 */,
/* 211 */,
/* 212 */,
/* 213 */,
/* 214 */,
/* 215 */,
/* 216 */,
/* 217 */,
/* 218 */,
/* 219 */,
/* 220 */,
/* 221 */,
/* 222 */,
/* 223 */,
/* 224 */,
/* 225 */,
/* 226 */,
/* 227 */,
/* 228 */
/***/ (function(module, exports) {

module.exports = wp.plugins;

/***/ }),
/* 229 */
/***/ (function(module, exports) {

module.exports = wp.element;

/***/ }),
/* 230 */,
/* 231 */,
/* 232 */,
/* 233 */,
/* 234 */,
/* 235 */,
/* 236 */
/***/ (function(module, exports) {

var blockName = 'core/separator';
wp.domReady(function () {
  wp.blocks.unregisterBlockStyle(blockName, 'default');
  wp.blocks.unregisterBlockStyle(blockName, 'wide');
  wp.blocks.unregisterBlockStyle(blockName, 'dots');
  wp.blocks.registerBlockStyle(blockName, [{
    name: 'wave',
    label: 'Wave',
    isDefault: true
  }, {
    name: 'line',
    label: 'Line'
  }]);
});

/***/ }),
/* 237 */
/***/ (function(module, exports) {

var blockName = 'core/pullquote';
wp.domReady(function () {
  wp.blocks.unregisterBlockStyle(blockName, 'default');
  wp.blocks.unregisterBlockStyle(blockName, 'solid-color');
  wp.blocks.registerBlockStyle(blockName, [{
    name: 'trevor-default',
    label: 'Default',
    isDefault: true
  }]);
});

/***/ }),
/* 238 */
/***/ (function(module, exports) {

var blockName = 'core/image';
wp.domReady(function () {
  wp.blocks.unregisterBlockStyle(blockName, 'default');
  wp.blocks.unregisterBlockStyle(blockName, 'rounded');
  wp.blocks.registerBlockStyle(blockName, [{
    name: 'trevor-default',
    label: 'Default',
    isDefault: true
  }]);
  wp.blocks.registerBlockStyle(blockName, [{
    name: 'full',
    label: 'Full Width',
    isDefault: true
  }]);
});

/***/ }),
/* 239 */
/***/ (function(module, exports) {



/***/ }),
/* 240 */
/***/ (function(module, exports) {

/** Used for built-in method references. */
var objectProto = Object.prototype;
/** Used to check objects for own properties. */

var hasOwnProperty = objectProto.hasOwnProperty;
/**
 * The base implementation of `_.has` without support for deep paths.
 *
 * @private
 * @param {Object} [object] The object to query.
 * @param {Array|string} key The key to check.
 * @returns {boolean} Returns `true` if `key` exists, else `false`.
 */

function baseHas(object, key) {
  return object != null && hasOwnProperty.call(object, key);
}

module.exports = baseHas;

/***/ }),
/* 241 */
/***/ (function(module, exports, __webpack_require__) {

var castPath = __webpack_require__(242),
    isArguments = __webpack_require__(277),
    isArray = __webpack_require__(49),
    isIndex = __webpack_require__(279),
    isLength = __webpack_require__(280),
    toKey = __webpack_require__(281);
/**
 * Checks if `path` exists on `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {Array|string} path The path to check.
 * @param {Function} hasFunc The function to check properties.
 * @returns {boolean} Returns `true` if `path` exists, else `false`.
 */


function hasPath(object, path, hasFunc) {
  path = castPath(path, object);
  var index = -1,
      length = path.length,
      result = false;

  while (++index < length) {
    var key = toKey(path[index]);

    if (!(result = object != null && hasFunc(object, key))) {
      break;
    }

    object = object[key];
  }

  if (result || ++index != length) {
    return result;
  }

  length = object == null ? 0 : object.length;
  return !!length && isLength(length) && isIndex(key, length) && (isArray(object) || isArguments(object));
}

module.exports = hasPath;

/***/ }),
/* 242 */
/***/ (function(module, exports, __webpack_require__) {

var isArray = __webpack_require__(49),
    isKey = __webpack_require__(243),
    stringToPath = __webpack_require__(244),
    toString = __webpack_require__(274);
/**
 * Casts `value` to a path array if it's not one.
 *
 * @private
 * @param {*} value The value to inspect.
 * @param {Object} [object] The object to query keys on.
 * @returns {Array} Returns the cast property path array.
 */


function castPath(value, object) {
  if (isArray(value)) {
    return value;
  }

  return isKey(value, object) ? [value] : stringToPath(toString(value));
}

module.exports = castPath;

/***/ }),
/* 243 */
/***/ (function(module, exports, __webpack_require__) {

var isArray = __webpack_require__(49),
    isSymbol = __webpack_require__(42);
/** Used to match property names within property paths. */


var reIsDeepProp = /\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/,
    reIsPlainProp = /^\w*$/;
/**
 * Checks if `value` is a property name and not a property path.
 *
 * @private
 * @param {*} value The value to check.
 * @param {Object} [object] The object to query keys on.
 * @returns {boolean} Returns `true` if `value` is a property name, else `false`.
 */

function isKey(value, object) {
  if (isArray(value)) {
    return false;
  }

  var type = typeof value;

  if (type == 'number' || type == 'symbol' || type == 'boolean' || value == null || isSymbol(value)) {
    return true;
  }

  return reIsPlainProp.test(value) || !reIsDeepProp.test(value) || object != null && value in Object(object);
}

module.exports = isKey;

/***/ }),
/* 244 */
/***/ (function(module, exports, __webpack_require__) {

var memoizeCapped = __webpack_require__(245);
/** Used to match property names within property paths. */


var rePropName = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g;
/** Used to match backslashes in property paths. */

var reEscapeChar = /\\(\\)?/g;
/**
 * Converts `string` to a property path array.
 *
 * @private
 * @param {string} string The string to convert.
 * @returns {Array} Returns the property path array.
 */

var stringToPath = memoizeCapped(function (string) {
  var result = [];

  if (string.charCodeAt(0) === 46
  /* . */
  ) {
      result.push('');
    }

  string.replace(rePropName, function (match, number, quote, subString) {
    result.push(quote ? subString.replace(reEscapeChar, '$1') : number || match);
  });
  return result;
});
module.exports = stringToPath;

/***/ }),
/* 245 */
/***/ (function(module, exports, __webpack_require__) {

var memoize = __webpack_require__(246);
/** Used as the maximum memoize cache size. */


var MAX_MEMOIZE_SIZE = 500;
/**
 * A specialized version of `_.memoize` which clears the memoized function's
 * cache when it exceeds `MAX_MEMOIZE_SIZE`.
 *
 * @private
 * @param {Function} func The function to have its output memoized.
 * @returns {Function} Returns the new memoized function.
 */

function memoizeCapped(func) {
  var result = memoize(func, function (key) {
    if (cache.size === MAX_MEMOIZE_SIZE) {
      cache.clear();
    }

    return key;
  });
  var cache = result.cache;
  return result;
}

module.exports = memoizeCapped;

/***/ }),
/* 246 */
/***/ (function(module, exports, __webpack_require__) {

var MapCache = __webpack_require__(247);
/** Error message constants. */


var FUNC_ERROR_TEXT = 'Expected a function';
/**
 * Creates a function that memoizes the result of `func`. If `resolver` is
 * provided, it determines the cache key for storing the result based on the
 * arguments provided to the memoized function. By default, the first argument
 * provided to the memoized function is used as the map cache key. The `func`
 * is invoked with the `this` binding of the memoized function.
 *
 * **Note:** The cache is exposed as the `cache` property on the memoized
 * function. Its creation may be customized by replacing the `_.memoize.Cache`
 * constructor with one whose instances implement the
 * [`Map`](http://ecma-international.org/ecma-262/7.0/#sec-properties-of-the-map-prototype-object)
 * method interface of `clear`, `delete`, `get`, `has`, and `set`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Function
 * @param {Function} func The function to have its output memoized.
 * @param {Function} [resolver] The function to resolve the cache key.
 * @returns {Function} Returns the new memoized function.
 * @example
 *
 * var object = { 'a': 1, 'b': 2 };
 * var other = { 'c': 3, 'd': 4 };
 *
 * var values = _.memoize(_.values);
 * values(object);
 * // => [1, 2]
 *
 * values(other);
 * // => [3, 4]
 *
 * object.a = 2;
 * values(object);
 * // => [1, 2]
 *
 * // Modify the result cache.
 * values.cache.set(object, ['a', 'b']);
 * values(object);
 * // => ['a', 'b']
 *
 * // Replace `_.memoize.Cache`.
 * _.memoize.Cache = WeakMap;
 */

function memoize(func, resolver) {
  if (typeof func != 'function' || resolver != null && typeof resolver != 'function') {
    throw new TypeError(FUNC_ERROR_TEXT);
  }

  var memoized = function memoized() {
    var args = arguments,
        key = resolver ? resolver.apply(this, args) : args[0],
        cache = memoized.cache;

    if (cache.has(key)) {
      return cache.get(key);
    }

    var result = func.apply(this, args);
    memoized.cache = cache.set(key, result) || cache;
    return result;
  };

  memoized.cache = new (memoize.Cache || MapCache)();
  return memoized;
} // Expose `MapCache`.


memoize.Cache = MapCache;
module.exports = memoize;

/***/ }),
/* 247 */
/***/ (function(module, exports, __webpack_require__) {

var mapCacheClear = __webpack_require__(248),
    mapCacheDelete = __webpack_require__(269),
    mapCacheGet = __webpack_require__(271),
    mapCacheHas = __webpack_require__(272),
    mapCacheSet = __webpack_require__(273);
/**
 * Creates a map cache object to store key-value pairs.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */


function MapCache(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;
  this.clear();

  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
} // Add methods to `MapCache`.


MapCache.prototype.clear = mapCacheClear;
MapCache.prototype['delete'] = mapCacheDelete;
MapCache.prototype.get = mapCacheGet;
MapCache.prototype.has = mapCacheHas;
MapCache.prototype.set = mapCacheSet;
module.exports = MapCache;

/***/ }),
/* 248 */
/***/ (function(module, exports, __webpack_require__) {

var Hash = __webpack_require__(249),
    ListCache = __webpack_require__(261),
    Map = __webpack_require__(268);
/**
 * Removes all key-value entries from the map.
 *
 * @private
 * @name clear
 * @memberOf MapCache
 */


function mapCacheClear() {
  this.size = 0;
  this.__data__ = {
    'hash': new Hash(),
    'map': new (Map || ListCache)(),
    'string': new Hash()
  };
}

module.exports = mapCacheClear;

/***/ }),
/* 249 */
/***/ (function(module, exports, __webpack_require__) {

var hashClear = __webpack_require__(250),
    hashDelete = __webpack_require__(257),
    hashGet = __webpack_require__(258),
    hashHas = __webpack_require__(259),
    hashSet = __webpack_require__(260);
/**
 * Creates a hash object.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */


function Hash(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;
  this.clear();

  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
} // Add methods to `Hash`.


Hash.prototype.clear = hashClear;
Hash.prototype['delete'] = hashDelete;
Hash.prototype.get = hashGet;
Hash.prototype.has = hashHas;
Hash.prototype.set = hashSet;
module.exports = Hash;

/***/ }),
/* 250 */
/***/ (function(module, exports, __webpack_require__) {

var nativeCreate = __webpack_require__(50);
/**
 * Removes all key-value entries from the hash.
 *
 * @private
 * @name clear
 * @memberOf Hash
 */


function hashClear() {
  this.__data__ = nativeCreate ? nativeCreate(null) : {};
  this.size = 0;
}

module.exports = hashClear;

/***/ }),
/* 251 */
/***/ (function(module, exports, __webpack_require__) {

var isFunction = __webpack_require__(252),
    isMasked = __webpack_require__(253),
    isObject = __webpack_require__(37),
    toSource = __webpack_require__(255);
/**
 * Used to match `RegExp`
 * [syntax characters](http://ecma-international.org/ecma-262/7.0/#sec-patterns).
 */


var reRegExpChar = /[\\^$.*+?()[\]{}|]/g;
/** Used to detect host constructors (Safari). */

var reIsHostCtor = /^\[object .+?Constructor\]$/;
/** Used for built-in method references. */

var funcProto = Function.prototype,
    objectProto = Object.prototype;
/** Used to resolve the decompiled source of functions. */

var funcToString = funcProto.toString;
/** Used to check objects for own properties. */

var hasOwnProperty = objectProto.hasOwnProperty;
/** Used to detect if a method is native. */

var reIsNative = RegExp('^' + funcToString.call(hasOwnProperty).replace(reRegExpChar, '\\$&').replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, '$1.*?') + '$');
/**
 * The base implementation of `_.isNative` without bad shim checks.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a native function,
 *  else `false`.
 */

function baseIsNative(value) {
  if (!isObject(value) || isMasked(value)) {
    return false;
  }

  var pattern = isFunction(value) ? reIsNative : reIsHostCtor;
  return pattern.test(toSource(value));
}

module.exports = baseIsNative;

/***/ }),
/* 252 */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(43),
    isObject = __webpack_require__(37);
/** `Object#toString` result references. */


var asyncTag = '[object AsyncFunction]',
    funcTag = '[object Function]',
    genTag = '[object GeneratorFunction]',
    proxyTag = '[object Proxy]';
/**
 * Checks if `value` is classified as a `Function` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a function, else `false`.
 * @example
 *
 * _.isFunction(_);
 * // => true
 *
 * _.isFunction(/abc/);
 * // => false
 */

function isFunction(value) {
  if (!isObject(value)) {
    return false;
  } // The use of `Object#toString` avoids issues with the `typeof` operator
  // in Safari 9 which returns 'object' for typed arrays and other constructors.


  var tag = baseGetTag(value);
  return tag == funcTag || tag == genTag || tag == asyncTag || tag == proxyTag;
}

module.exports = isFunction;

/***/ }),
/* 253 */
/***/ (function(module, exports, __webpack_require__) {

var coreJsData = __webpack_require__(254);
/** Used to detect methods masquerading as native. */


var maskSrcKey = function () {
  var uid = /[^.]+$/.exec(coreJsData && coreJsData.keys && coreJsData.keys.IE_PROTO || '');
  return uid ? 'Symbol(src)_1.' + uid : '';
}();
/**
 * Checks if `func` has its source masked.
 *
 * @private
 * @param {Function} func The function to check.
 * @returns {boolean} Returns `true` if `func` is masked, else `false`.
 */


function isMasked(func) {
  return !!maskSrcKey && maskSrcKey in func;
}

module.exports = isMasked;

/***/ }),
/* 254 */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(36);
/** Used to detect overreaching core-js shims. */


var coreJsData = root['__core-js_shared__'];
module.exports = coreJsData;

/***/ }),
/* 255 */
/***/ (function(module, exports) {

/** Used for built-in method references. */
var funcProto = Function.prototype;
/** Used to resolve the decompiled source of functions. */

var funcToString = funcProto.toString;
/**
 * Converts `func` to its source code.
 *
 * @private
 * @param {Function} func The function to convert.
 * @returns {string} Returns the source code.
 */

function toSource(func) {
  if (func != null) {
    try {
      return funcToString.call(func);
    } catch (e) {}

    try {
      return func + '';
    } catch (e) {}
  }

  return '';
}

module.exports = toSource;

/***/ }),
/* 256 */
/***/ (function(module, exports) {

/**
 * Gets the value at `key` of `object`.
 *
 * @private
 * @param {Object} [object] The object to query.
 * @param {string} key The key of the property to get.
 * @returns {*} Returns the property value.
 */
function getValue(object, key) {
  return object == null ? undefined : object[key];
}

module.exports = getValue;

/***/ }),
/* 257 */
/***/ (function(module, exports) {

/**
 * Removes `key` and its value from the hash.
 *
 * @private
 * @name delete
 * @memberOf Hash
 * @param {Object} hash The hash to modify.
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function hashDelete(key) {
  var result = this.has(key) && delete this.__data__[key];
  this.size -= result ? 1 : 0;
  return result;
}

module.exports = hashDelete;

/***/ }),
/* 258 */
/***/ (function(module, exports, __webpack_require__) {

var nativeCreate = __webpack_require__(50);
/** Used to stand-in for `undefined` hash values. */


var HASH_UNDEFINED = '__lodash_hash_undefined__';
/** Used for built-in method references. */

var objectProto = Object.prototype;
/** Used to check objects for own properties. */

var hasOwnProperty = objectProto.hasOwnProperty;
/**
 * Gets the hash value for `key`.
 *
 * @private
 * @name get
 * @memberOf Hash
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */

function hashGet(key) {
  var data = this.__data__;

  if (nativeCreate) {
    var result = data[key];
    return result === HASH_UNDEFINED ? undefined : result;
  }

  return hasOwnProperty.call(data, key) ? data[key] : undefined;
}

module.exports = hashGet;

/***/ }),
/* 259 */
/***/ (function(module, exports, __webpack_require__) {

var nativeCreate = __webpack_require__(50);
/** Used for built-in method references. */


var objectProto = Object.prototype;
/** Used to check objects for own properties. */

var hasOwnProperty = objectProto.hasOwnProperty;
/**
 * Checks if a hash value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf Hash
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */

function hashHas(key) {
  var data = this.__data__;
  return nativeCreate ? data[key] !== undefined : hasOwnProperty.call(data, key);
}

module.exports = hashHas;

/***/ }),
/* 260 */
/***/ (function(module, exports, __webpack_require__) {

var nativeCreate = __webpack_require__(50);
/** Used to stand-in for `undefined` hash values. */


var HASH_UNDEFINED = '__lodash_hash_undefined__';
/**
 * Sets the hash `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf Hash
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the hash instance.
 */

function hashSet(key, value) {
  var data = this.__data__;
  this.size += this.has(key) ? 0 : 1;
  data[key] = nativeCreate && value === undefined ? HASH_UNDEFINED : value;
  return this;
}

module.exports = hashSet;

/***/ }),
/* 261 */
/***/ (function(module, exports, __webpack_require__) {

var listCacheClear = __webpack_require__(262),
    listCacheDelete = __webpack_require__(263),
    listCacheGet = __webpack_require__(265),
    listCacheHas = __webpack_require__(266),
    listCacheSet = __webpack_require__(267);
/**
 * Creates an list cache object.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */


function ListCache(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;
  this.clear();

  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
} // Add methods to `ListCache`.


ListCache.prototype.clear = listCacheClear;
ListCache.prototype['delete'] = listCacheDelete;
ListCache.prototype.get = listCacheGet;
ListCache.prototype.has = listCacheHas;
ListCache.prototype.set = listCacheSet;
module.exports = ListCache;

/***/ }),
/* 262 */
/***/ (function(module, exports) {

/**
 * Removes all key-value entries from the list cache.
 *
 * @private
 * @name clear
 * @memberOf ListCache
 */
function listCacheClear() {
  this.__data__ = [];
  this.size = 0;
}

module.exports = listCacheClear;

/***/ }),
/* 263 */
/***/ (function(module, exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(51);
/** Used for built-in method references. */


var arrayProto = Array.prototype;
/** Built-in value references. */

var splice = arrayProto.splice;
/**
 * Removes `key` and its value from the list cache.
 *
 * @private
 * @name delete
 * @memberOf ListCache
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */

function listCacheDelete(key) {
  var data = this.__data__,
      index = assocIndexOf(data, key);

  if (index < 0) {
    return false;
  }

  var lastIndex = data.length - 1;

  if (index == lastIndex) {
    data.pop();
  } else {
    splice.call(data, index, 1);
  }

  --this.size;
  return true;
}

module.exports = listCacheDelete;

/***/ }),
/* 264 */
/***/ (function(module, exports) {

/**
 * Performs a
 * [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
 * comparison between two values to determine if they are equivalent.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if the values are equivalent, else `false`.
 * @example
 *
 * var object = { 'a': 1 };
 * var other = { 'a': 1 };
 *
 * _.eq(object, object);
 * // => true
 *
 * _.eq(object, other);
 * // => false
 *
 * _.eq('a', 'a');
 * // => true
 *
 * _.eq('a', Object('a'));
 * // => false
 *
 * _.eq(NaN, NaN);
 * // => true
 */
function eq(value, other) {
  return value === other || value !== value && other !== other;
}

module.exports = eq;

/***/ }),
/* 265 */
/***/ (function(module, exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(51);
/**
 * Gets the list cache value for `key`.
 *
 * @private
 * @name get
 * @memberOf ListCache
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */


function listCacheGet(key) {
  var data = this.__data__,
      index = assocIndexOf(data, key);
  return index < 0 ? undefined : data[index][1];
}

module.exports = listCacheGet;

/***/ }),
/* 266 */
/***/ (function(module, exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(51);
/**
 * Checks if a list cache value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf ListCache
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */


function listCacheHas(key) {
  return assocIndexOf(this.__data__, key) > -1;
}

module.exports = listCacheHas;

/***/ }),
/* 267 */
/***/ (function(module, exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(51);
/**
 * Sets the list cache `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf ListCache
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the list cache instance.
 */


function listCacheSet(key, value) {
  var data = this.__data__,
      index = assocIndexOf(data, key);

  if (index < 0) {
    ++this.size;
    data.push([key, value]);
  } else {
    data[index][1] = value;
  }

  return this;
}

module.exports = listCacheSet;

/***/ }),
/* 268 */
/***/ (function(module, exports, __webpack_require__) {

var getNative = __webpack_require__(75),
    root = __webpack_require__(36);
/* Built-in method references that are verified to be native. */


var Map = getNative(root, 'Map');
module.exports = Map;

/***/ }),
/* 269 */
/***/ (function(module, exports, __webpack_require__) {

var getMapData = __webpack_require__(52);
/**
 * Removes `key` and its value from the map.
 *
 * @private
 * @name delete
 * @memberOf MapCache
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */


function mapCacheDelete(key) {
  var result = getMapData(this, key)['delete'](key);
  this.size -= result ? 1 : 0;
  return result;
}

module.exports = mapCacheDelete;

/***/ }),
/* 270 */
/***/ (function(module, exports) {

/**
 * Checks if `value` is suitable for use as unique object key.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is suitable, else `false`.
 */
function isKeyable(value) {
  var type = typeof value;
  return type == 'string' || type == 'number' || type == 'symbol' || type == 'boolean' ? value !== '__proto__' : value === null;
}

module.exports = isKeyable;

/***/ }),
/* 271 */
/***/ (function(module, exports, __webpack_require__) {

var getMapData = __webpack_require__(52);
/**
 * Gets the map value for `key`.
 *
 * @private
 * @name get
 * @memberOf MapCache
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */


function mapCacheGet(key) {
  return getMapData(this, key).get(key);
}

module.exports = mapCacheGet;

/***/ }),
/* 272 */
/***/ (function(module, exports, __webpack_require__) {

var getMapData = __webpack_require__(52);
/**
 * Checks if a map value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf MapCache
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */


function mapCacheHas(key) {
  return getMapData(this, key).has(key);
}

module.exports = mapCacheHas;

/***/ }),
/* 273 */
/***/ (function(module, exports, __webpack_require__) {

var getMapData = __webpack_require__(52);
/**
 * Sets the map `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf MapCache
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the map cache instance.
 */


function mapCacheSet(key, value) {
  var data = getMapData(this, key),
      size = data.size;
  data.set(key, value);
  this.size += data.size == size ? 0 : 1;
  return this;
}

module.exports = mapCacheSet;

/***/ }),
/* 274 */
/***/ (function(module, exports, __webpack_require__) {

var baseToString = __webpack_require__(275);
/**
 * Converts `value` to a string. An empty string is returned for `null`
 * and `undefined` values. The sign of `-0` is preserved.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 * @example
 *
 * _.toString(null);
 * // => ''
 *
 * _.toString(-0);
 * // => '-0'
 *
 * _.toString([1, 2, 3]);
 * // => '1,2,3'
 */


function toString(value) {
  return value == null ? '' : baseToString(value);
}

module.exports = toString;

/***/ }),
/* 275 */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(35),
    arrayMap = __webpack_require__(276),
    isArray = __webpack_require__(49),
    isSymbol = __webpack_require__(42);
/** Used as references for various `Number` constants. */


var INFINITY = 1 / 0;
/** Used to convert symbols to primitives and strings. */

var symbolProto = Symbol ? Symbol.prototype : undefined,
    symbolToString = symbolProto ? symbolProto.toString : undefined;
/**
 * The base implementation of `_.toString` which doesn't convert nullish
 * values to empty strings.
 *
 * @private
 * @param {*} value The value to process.
 * @returns {string} Returns the string.
 */

function baseToString(value) {
  // Exit early for strings to avoid a performance hit in some environments.
  if (typeof value == 'string') {
    return value;
  }

  if (isArray(value)) {
    // Recursively convert values (susceptible to call stack limits).
    return arrayMap(value, baseToString) + '';
  }

  if (isSymbol(value)) {
    return symbolToString ? symbolToString.call(value) : '';
  }

  var result = value + '';
  return result == '0' && 1 / value == -INFINITY ? '-0' : result;
}

module.exports = baseToString;

/***/ }),
/* 276 */
/***/ (function(module, exports) {

/**
 * A specialized version of `_.map` for arrays without support for iteratee
 * shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns the new mapped array.
 */
function arrayMap(array, iteratee) {
  var index = -1,
      length = array == null ? 0 : array.length,
      result = Array(length);

  while (++index < length) {
    result[index] = iteratee(array[index], index, array);
  }

  return result;
}

module.exports = arrayMap;

/***/ }),
/* 277 */
/***/ (function(module, exports, __webpack_require__) {

var baseIsArguments = __webpack_require__(278),
    isObjectLike = __webpack_require__(44);
/** Used for built-in method references. */


var objectProto = Object.prototype;
/** Used to check objects for own properties. */

var hasOwnProperty = objectProto.hasOwnProperty;
/** Built-in value references. */

var propertyIsEnumerable = objectProto.propertyIsEnumerable;
/**
 * Checks if `value` is likely an `arguments` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an `arguments` object,
 *  else `false`.
 * @example
 *
 * _.isArguments(function() { return arguments; }());
 * // => true
 *
 * _.isArguments([1, 2, 3]);
 * // => false
 */

var isArguments = baseIsArguments(function () {
  return arguments;
}()) ? baseIsArguments : function (value) {
  return isObjectLike(value) && hasOwnProperty.call(value, 'callee') && !propertyIsEnumerable.call(value, 'callee');
};
module.exports = isArguments;

/***/ }),
/* 278 */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(43),
    isObjectLike = __webpack_require__(44);
/** `Object#toString` result references. */


var argsTag = '[object Arguments]';
/**
 * The base implementation of `_.isArguments`.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an `arguments` object,
 */

function baseIsArguments(value) {
  return isObjectLike(value) && baseGetTag(value) == argsTag;
}

module.exports = baseIsArguments;

/***/ }),
/* 279 */
/***/ (function(module, exports) {

/** Used as references for various `Number` constants. */
var MAX_SAFE_INTEGER = 9007199254740991;
/** Used to detect unsigned integer values. */

var reIsUint = /^(?:0|[1-9]\d*)$/;
/**
 * Checks if `value` is a valid array-like index.
 *
 * @private
 * @param {*} value The value to check.
 * @param {number} [length=MAX_SAFE_INTEGER] The upper bounds of a valid index.
 * @returns {boolean} Returns `true` if `value` is a valid index, else `false`.
 */

function isIndex(value, length) {
  var type = typeof value;
  length = length == null ? MAX_SAFE_INTEGER : length;
  return !!length && (type == 'number' || type != 'symbol' && reIsUint.test(value)) && value > -1 && value % 1 == 0 && value < length;
}

module.exports = isIndex;

/***/ }),
/* 280 */
/***/ (function(module, exports) {

/** Used as references for various `Number` constants. */
var MAX_SAFE_INTEGER = 9007199254740991;
/**
 * Checks if `value` is a valid array-like length.
 *
 * **Note:** This method is loosely based on
 * [`ToLength`](http://ecma-international.org/ecma-262/7.0/#sec-tolength).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a valid length, else `false`.
 * @example
 *
 * _.isLength(3);
 * // => true
 *
 * _.isLength(Number.MIN_VALUE);
 * // => false
 *
 * _.isLength(Infinity);
 * // => false
 *
 * _.isLength('3');
 * // => false
 */

function isLength(value) {
  return typeof value == 'number' && value > -1 && value % 1 == 0 && value <= MAX_SAFE_INTEGER;
}

module.exports = isLength;

/***/ }),
/* 281 */
/***/ (function(module, exports, __webpack_require__) {

var isSymbol = __webpack_require__(42);
/** Used as references for various `Number` constants. */


var INFINITY = 1 / 0;
/**
 * Converts `value` to a string key if it's not a string or symbol.
 *
 * @private
 * @param {*} value The value to inspect.
 * @returns {string|symbol} Returns the key.
 */

function toKey(value) {
  if (typeof value == 'string' || isSymbol(value)) {
    return value;
  }

  var result = value + '';
  return result == '0' && 1 / value == -INFINITY ? '-0' : result;
}

module.exports = toKey;

/***/ }),
/* 282 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return CoreHeading; });
/* harmony import */ var _app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(3);
/* harmony import */ var _app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(4);
/* harmony import */ var _app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(6);
/* harmony import */ var _app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_createSuper__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(5);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(1);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(19);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(8);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__);







var InspectorAdvancedControls = wp.blockEditor.InspectorAdvancedControls;
/**
 * Adds the description input to the heading block.
 */

var CoreHeading = /*#__PURE__*/function (_React$Component) {
  Object(_app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_2__[/* default */ "a"])(CoreHeading, _React$Component);

  var _super = Object(_app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_createSuper__WEBPACK_IMPORTED_MODULE_3__[/* default */ "a"])(CoreHeading);

  function CoreHeading() {
    Object(_app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])(this, CoreHeading);

    return _super.apply(this, arguments);
  }

  Object(_app_node_modules_babel_preset_react_app_node_modules_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_1__[/* default */ "a"])(CoreHeading, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          attributes = _this$props.attributes,
          setAttributes = _this$props.setAttributes,
          isSelected = _this$props.isSelected;
      var description = attributes.description;
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_4___default.a.createElement(react__WEBPACK_IMPORTED_MODULE_4___default.a.Fragment, null, isSelected && /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_4___default.a.createElement(InspectorAdvancedControls, null, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_4___default.a.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["TextareaControl"], {
        label: "Description",
        value: description,
        help: "Enter description to list this heading in the highlights menu. Please also make you set an unique a HTML anchor to the input below.",
        onChange: function onChange(description) {
          return setAttributes({
            description: description
          });
        }
      })));
    }
  }]);

  return CoreHeading;
}(react__WEBPACK_IMPORTED_MODULE_4___default.a.Component);
/**
 * Adds the custom attributes.
 */


CoreHeading.placement = 'top';

Object(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_5__["addFilter"])('blocks.registerBlockType', 'trevor/heading-custom-attributes', function (settings) {
  if (settings && settings.name === 'core/heading' && settings.attributes) {
    settings.attributes = Object.assign(settings.attributes, {
      description: {
        type: 'text',
        default: ''
      }
    });
  }

  return settings;
});

/***/ }),
/* 283 */,
/* 284 */,
/* 285 */,
/* 286 */,
/* 287 */,
/* 288 */,
/* 289 */,
/* 290 */,
/* 291 */,
/* 292 */,
/* 293 */,
/* 294 */,
/* 295 */,
/* 296 */,
/* 297 */,
/* 298 */,
/* 299 */,
/* 300 */,
/* 301 */,
/* 302 */,
/* 303 */,
/* 304 */,
/* 305 */,
/* 306 */,
/* 307 */,
/* 308 */,
/* 309 */,
/* 310 */,
/* 311 */,
/* 312 */,
/* 313 */,
/* 314 */,
/* 315 */,
/* 316 */,
/* 317 */,
/* 318 */,
/* 319 */,
/* 320 */,
/* 321 */,
/* 322 */,
/* 323 */,
/* 324 */,
/* 325 */,
/* 326 */,
/* 327 */,
/* 328 */,
/* 329 */,
/* 330 */,
/* 331 */,
/* 332 */,
/* 333 */,
/* 334 */,
/* 335 */,
/* 336 */,
/* 337 */,
/* 338 */,
/* 339 */,
/* 340 */,
/* 341 */,
/* 342 */,
/* 343 */,
/* 344 */,
/* 345 */,
/* 346 */,
/* 347 */,
/* 348 */,
/* 349 */,
/* 350 */,
/* 351 */,
/* 352 */,
/* 353 */,
/* 354 */,
/* 355 */,
/* 356 */,
/* 357 */,
/* 358 */,
/* 359 */,
/* 360 */,
/* 361 */,
/* 362 */,
/* 363 */,
/* 364 */,
/* 365 */,
/* 366 */,
/* 367 */,
/* 368 */,
/* 369 */,
/* 370 */,
/* 371 */,
/* 372 */,
/* 373 */,
/* 374 */,
/* 375 */,
/* 376 */,
/* 377 */,
/* 378 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./src/plugin/js/blocks/block-styles/core-separator.js
var core_separator = __webpack_require__(236);

// EXTERNAL MODULE: ./src/plugin/js/blocks/block-styles/core-pullquote.js
var core_pullquote = __webpack_require__(237);

// EXTERNAL MODULE: ./src/plugin/js/blocks/block-styles/core-image.js
var core_image = __webpack_require__(238);

// CONCATENATED MODULE: ./src/plugin/js/blocks/block-styles/index.js



/*
 * List all block styles
 * https://wordpress.stackexchange.com/a/352560
 */

function getBlockStyles() {
  wp.blocks.getBlockTypes().forEach(function (block) {
    if (_.isArray(block['styles'])) {
      console.log(block.name, _.pluck(block['styles'], 'name'));
    }
  });
} // wp.domReady(getBlockStyles);
// EXTERNAL MODULE: ./src/plugin/js/blocks/validators/index.js
var validators = __webpack_require__(239);

// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/defineProperty.js
var defineProperty = __webpack_require__(12);

// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/classCallCheck.js
var classCallCheck = __webpack_require__(3);

// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/createClass.js
var createClass = __webpack_require__(4);

// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/inherits.js + 1 modules
var inherits = __webpack_require__(6);

// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/createSuper.js + 3 modules
var createSuper = __webpack_require__(5);

// EXTERNAL MODULE: ./node_modules/react/index.js
var react = __webpack_require__(1);
var react_default = /*#__PURE__*/__webpack_require__.n(react);

// EXTERNAL MODULE: external "wp.editPost"
var external_wp_editPost_ = __webpack_require__(59);

// EXTERNAL MODULE: external "wp.plugins"
var external_wp_plugins_ = __webpack_require__(228);

// EXTERNAL MODULE: external "wp.compose"
var external_wp_compose_ = __webpack_require__(29);

// EXTERNAL MODULE: external "wp.data"
var external_wp_data_ = __webpack_require__(25);

// EXTERNAL MODULE: external "wp.components"
var external_wp_components_ = __webpack_require__(8);

// EXTERNAL MODULE: external "wp.hooks"
var external_wp_hooks_ = __webpack_require__(19);

// EXTERNAL MODULE: ./node_modules/lodash/has.js
var has = __webpack_require__(73);
var has_default = /*#__PURE__*/__webpack_require__.n(has);

// EXTERNAL MODULE: external "wp.blockEditor"
var external_wp_blockEditor_ = __webpack_require__(14);

// CONCATENATED MODULE: ./src/plugin/js/blocks/fields/file.js






var file_temp;







 // https://github.com/WordPress/gutenberg/blob/master/packages/editor/src/components/post-featured-image/index.js

var FileField = Object(external_wp_compose_["compose"])(Object(external_wp_data_["withSelect"])(function (select, _ref) {
  var metaKey = _ref.metaKey;

  var _select = select('core'),
      getMedia = _select.getMedia;

  var _select2 = select("core/editor"),
      getEditedPostAttribute = _select2.getEditedPostAttribute,
      getCurrentPostId = _select2.getCurrentPostId;

  var metaData = getEditedPostAttribute("meta") || {};
  var value = metaData[metaKey] || null;
  value = parseInt(value);
  if (isNaN(value)) value = null;
  return {
    value: value,
    media: value ? getMedia(value) : null,
    currentPostId: getCurrentPostId()
  };
}), Object(external_wp_data_["withDispatch"])(function (dispatch, _ref2) {
  var metaKey = _ref2.metaKey;

  var _dispatch = dispatch("core/editor"),
      editPost = _dispatch.editPost;

  return {
    updateValue: function updateValue(value) {
      return editPost({
        meta: Object(defineProperty["a" /* default */])({}, metaKey, String(value))
      });
    }
  };
}))((file_temp = /*#__PURE__*/function (_React$Component) {
  Object(inherits["a" /* default */])(_temp, _React$Component);

  var _super = Object(createSuper["a" /* default */])(_temp);

  function _temp() {
    var _this;

    Object(classCallCheck["a" /* default */])(this, _temp);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _this.onUpdateImage = function (media) {
      return _this.props.updateValue(media.id);
    };

    _this.onRemoveImage = function () {
      return _this.props.updateValue(null);
    };

    return _this;
  }

  Object(createClass["a" /* default */])(_temp, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          label = _this$props.label,
          value = _this$props.value,
          media = _this$props.media,
          currentPostId = _this$props.currentPostId,
          allowedTypes = _this$props.allowedTypes;
      var mediaWidth, mediaHeight, mediaSourceUrl;

      if (media) {
        var mediaSize = Object(external_wp_hooks_["applyFilters"])('editor.PostFeaturedImage.imageSize', 'full', media.id, currentPostId);

        if (has_default()(media, ['media_details', 'sizes', mediaSize])) {
          // use mediaSize when available
          mediaWidth = media.media_details.sizes[mediaSize].width;
          mediaHeight = media.media_details.sizes[mediaSize].height;
          mediaSourceUrl = media.media_details.sizes[mediaSize].source_url;
        } else {
          // get fallbackMediaSize if mediaSize is not available
          var fallbackMediaSize = Object(external_wp_hooks_["applyFilters"])('editor.PostFeaturedImage.imageSize', 'thumbnail', media.id, currentPostId);

          if (has_default()(media, ['media_details', 'sizes', fallbackMediaSize])) {
            // use fallbackMediaSize when mediaSize is not available
            mediaWidth = media.media_details.sizes[fallbackMediaSize].width;
            mediaHeight = media.media_details.sizes[fallbackMediaSize].height;
            mediaSourceUrl = media.media_details.sizes[fallbackMediaSize].source_url;
          } else {
            // use full image size when mediaFallbackSize and mediaSize are not available
            mediaWidth = media.media_details.width;
            mediaHeight = media.media_details.height;
            mediaSourceUrl = media.source_url;
          }
        }
      }

      return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement("hr", null), /*#__PURE__*/react_default.a.createElement(external_wp_components_["BaseControl"], {
        label: label
      }, /*#__PURE__*/react_default.a.createElement("div", {
        className: "editor-post-featured-image"
      }, /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["MediaUpload"], {
        title: label,
        onSelect: this.onUpdateImage,
        allowedTypes: allowedTypes,
        modalClass: "editor-post-featured-image__media-modal",
        render: function render(_ref3) {
          var open = _ref3.open;
          return /*#__PURE__*/react_default.a.createElement("div", {
            className: "editor-post-featured-image__container"
          }, /*#__PURE__*/react_default.a.createElement(external_wp_components_["Button"], {
            className: !value ? "editor-post-featured-image__toggle" : "editor-post-featured-image__preview",
            onClick: open,
            "aria-label": !value ? null : "Edit or update the image"
          }, !!value && media && /*#__PURE__*/react_default.a.createElement(external_wp_components_["ResponsiveWrapper"], {
            naturalWidth: mediaWidth,
            naturalHeight: mediaHeight,
            isInline: true
          }, /*#__PURE__*/react_default.a.createElement("img", {
            src: mediaSourceUrl,
            alt: ""
          })), !!value && !media && /*#__PURE__*/react_default.a.createElement(external_wp_components_["Spinner"], null), !value && "Set ".concat(label)));
        },
        value: value
      }), !!value && media && !media.isLoading && /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement("br", null), /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["MediaUpload"], {
        title: label,
        onSelect: this.onUpdateImage,
        allowedTypes: allowedTypes,
        value: value,
        modalClass: "editor-post-featured-image__media-modal",
        render: function render(_ref4) {
          var open = _ref4.open;
          return /*#__PURE__*/react_default.a.createElement(external_wp_components_["Button"], {
            onClick: open,
            isDefault: true,
            isLarge: true
          }, "Replace ", label);
        }
      })), !!value && /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_components_["Button"], {
        onClick: this.onRemoveImage,
        isLink: true,
        isDestructive: true
      }, "Remove ", label)))));
    }
  }]);

  return _temp;
}(react_default.a.Component), file_temp));
/* harmony default export */ var file = (FileField);
// CONCATENATED MODULE: ./src/plugin/js/blocks/general.js












var _TrevorWP$screen$edit = TrevorWP.screen.editorBlocksData,
    editorBlocksData = _TrevorWP$screen$edit === void 0 ? {} : _TrevorWP$screen$edit;
var _editorBlocksData$met = editorBlocksData.metaKeys,
    general_metaKeys = _editorBlocksData$met === void 0 ? {} : _editorBlocksData$met;
var _editorBlocksData$met2 = editorBlocksData[general_metaKeys.KEY_HEADER_BG_CLR],
    BG_COLOR_DATA = _editorBlocksData$met2 === void 0 ? {} : _editorBlocksData$met2;
var META_KEY_MAP = {
  headerType: general_metaKeys.KEY_HEADER_TYPE,
  headerBgColor: general_metaKeys.KEY_HEADER_BG_CLR,
  lengthInd: general_metaKeys.KEY_LENGTH_IND,
  showShare: general_metaKeys.KEY_HEADER_SNOW_SHARE,
  showDate: general_metaKeys.KEY_HEADER_SHOW_DATE,
  showAuthor: general_metaKeys.KEY_HEADER_SHOW_AUTHOR,
  reRecirculationCards: general_metaKeys.KEY_RECIRCULATION_CARDS,
  billId: general_metaKeys.KEY_BILL_ID,
  pronouns: general_metaKeys.KEY_PRONOUNS,
  cardOptions: general_metaKeys.KEY_CARD_OPTIONS,
  showCardEyebrow: general_metaKeys.KEY_SHOW_CARD_EYEBROW
};

var BG_COLOR_HEX_2_NAME_MAP = function () {
  var out = {};
  Object.keys(BG_COLOR_DATA.colors || {}).forEach(function (key) {
    return out[BG_COLOR_DATA.colors[key].color] = key;
  });
  return out;
}();

var general_PostSidebar = /*#__PURE__*/function (_React$Component) {
  Object(inherits["a" /* default */])(PostSidebar, _React$Component);

  var _super = Object(createSuper["a" /* default */])(PostSidebar);

  function PostSidebar() {
    var _this;

    Object(classCallCheck["a" /* default */])(this, PostSidebar);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _this.handleHeaderTypeChange = function (newVal) {
      return _this.props.updatePostMeta('headerType', newVal);
    };

    _this.handleShowShare = function (newVal) {
      return _this.props.updatePostMeta('showShare', newVal);
    };

    _this.handleShowDate = function (newVal) {
      return _this.props.updatePostMeta('showDate', newVal);
    };

    _this.handleShowAuthor = function (newVal) {
      return _this.props.updatePostMeta('showAuthor', newVal);
    };

    _this.handleHeaderBgColor = function (colorHex) {
      _this.props.updatePostMeta('headerBgColor', BG_COLOR_HEX_2_NAME_MAP[colorHex] || null);
    };

    _this.handleReRecirculationCardsChange = function (newVal) {
      return _this.props.updatePostMeta('reRecirculationCards', newVal);
    };

    _this.handleLengthIndChange = function (newVal) {
      return _this.props.updatePostMeta('lengthInd', newVal);
    };

    _this.handleSlugChange = function (slug) {
      return _this.props.editPost({
        slug: slug
      });
    };

    _this.handleBillIdChange = function (billId) {
      return _this.props.updatePostMeta('billId', billId);
    };

    _this.handlePronounsChange = function (pronouns) {
      return _this.props.updatePostMeta('pronouns', pronouns);
    };

    _this.handleShowCardEyebrow = function (newVal) {
      return _this.props.updatePostMeta('showCardEyebrow', newVal);
    };

    _this.selectOptions = {
      headerTypes: function () {
        var _ref = editorBlocksData[META_KEY_MAP.headerType] || {},
            _ref$types = _ref.types,
            types = _ref$types === void 0 ? {} : _ref$types;

        return Object.keys(types).map(function (key) {
          var config = types[key];
          return {
            value: key,
            label: config.name
          };
        });
      }(),
      contentLength: function () {
        var _ref2 = editorBlocksData[META_KEY_MAP.lengthInd] || {},
            _ref2$settings = _ref2.settings,
            settings = _ref2$settings === void 0 ? {} : _ref2$settings;

        return Object.keys(settings).map(function (key) {
          var config = settings[key];
          return {
            value: key,
            label: config.name
          };
        });
      }(),
      reRecirculationCards: function () {
        var _ref3 = editorBlocksData[META_KEY_MAP.reRecirculationCards] || {},
            _ref3$settings = _ref3.settings,
            settings = _ref3$settings === void 0 ? {} : _ref3$settings;

        return Object.keys(settings).map(function (key) {
          var config = settings[key];
          return {
            value: key,
            label: config.name
          };
        });
      }()
    };
    return _this;
  }

  Object(createClass["a" /* default */])(PostSidebar, [{
    key: "canRenderField",
    value: function canRenderField(metaKey) {
      var postType = this.props.postType;
      if (!editorBlocksData.metaKeysByPostType || !editorBlocksData.metaKeysByPostType[metaKey]) return false;
      return -1 !== editorBlocksData.metaKeysByPostType[metaKey].indexOf(postType);
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props = this.props,
          headerType = _this$props.headerType,
          headerBgColor = _this$props.headerBgColor,
          lengthInd = _this$props.lengthInd,
          showShare = _this$props.showShare,
          showDate = _this$props.showDate,
          showAuthor = _this$props.showAuthor,
          showCardEyebrow = _this$props.showCardEyebrow,
          slug = _this$props.slug,
          reRecirculationCards = _this$props.reRecirculationCards,
          billId = _this$props.billId,
          pronouns = _this$props.pronouns;

      var _ref4 = ((editorBlocksData[META_KEY_MAP.headerType] || {}).types || {})[headerType] || {},
          _ref4$supports = _ref4.supports,
          headerSupports = _ref4$supports === void 0 ? [] : _ref4$supports;

      console.log({
        META_KEY_MAP: META_KEY_MAP
      });
      return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_editPost_["PluginDocumentSettingPanel"], {
        name: "trevor-entry-general",
        icon: "admin-settings",
        title: "General"
      }, /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
        label: "Slug",
        value: slug,
        onChange: this.handleSlugChange
      }), this.canRenderField(general_metaKeys.KEY_FILE) && /*#__PURE__*/react_default.a.createElement(file, {
        key: "fileInput",
        metaKey: TrevorWP.screen.editorBlocksData.metaKeys['KEY_FILE'],
        label: "PDF Version",
        allowedTypes: ['application/pdf']
      }), this.canRenderField(META_KEY_MAP.billId) && /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
        label: "Bill ID",
        value: billId,
        onChange: this.handleBillIdChange
      }), this.canRenderField(META_KEY_MAP.pronouns) && /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
        label: "Pronouns",
        value: pronouns,
        onChange: this.handlePronounsChange
      })), /*#__PURE__*/react_default.a.createElement(external_wp_editPost_["PluginDocumentSettingPanel"], {
        name: "trevor-entry-header",
        icon: "store",
        title: "Header"
      }, this.canRenderField(META_KEY_MAP.headerType) && /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_components_["SelectControl"], {
        label: "Header Type",
        value: headerType,
        options: this.selectOptions.headerTypes,
        onChange: this.handleHeaderTypeChange
      }), -1 !== headerSupports.indexOf('bg-color') && /*#__PURE__*/react_default.a.createElement(external_wp_components_["BaseControl"], {
        label: "Background Color"
      }, /*#__PURE__*/react_default.a.createElement(external_wp_components_["ColorPalette"], {
        colors: Object.values(BG_COLOR_DATA.colors),
        clearable: false,
        value: (BG_COLOR_DATA.colors[headerBgColor] || {
          color: BG_COLOR_DATA.colors[BG_COLOR_DATA.default]
        }).color,
        disableCustomColors: true,
        onChange: this.handleHeaderBgColor
      }))), this.canRenderField(META_KEY_MAP.showShare) && /*#__PURE__*/react_default.a.createElement(external_wp_components_["CheckboxControl"], {
        label: "Show Sharing",
        checked: showShare,
        onChange: this.handleShowShare
      }), this.canRenderField(META_KEY_MAP.showDate) && /*#__PURE__*/react_default.a.createElement(external_wp_components_["CheckboxControl"], {
        label: "Show Date",
        checked: showDate,
        onChange: this.handleShowDate
      }), this.canRenderField(META_KEY_MAP.showAuthor) && /*#__PURE__*/react_default.a.createElement(external_wp_components_["CheckboxControl"], {
        label: "Show Author",
        checked: showAuthor,
        onChange: this.handleShowAuthor
      }), this.canRenderField(META_KEY_MAP.lengthInd) && /*#__PURE__*/react_default.a.createElement(external_wp_components_["SelectControl"], {
        label: "Content Length",
        value: lengthInd,
        options: this.selectOptions.contentLength,
        onChange: this.handleLengthIndChange
      }), this.canRenderField(META_KEY_MAP.reRecirculationCards) && /*#__PURE__*/react_default.a.createElement("div", {
        class: "trevor-select-multiple"
      }, /*#__PURE__*/react_default.a.createElement(external_wp_components_["SelectControl"], {
        label: "Recirculation Cards",
        value: reRecirculationCards,
        options: this.selectOptions.reRecirculationCards,
        onChange: this.handleReRecirculationCardsChange,
        help: "You may use CTRL-Click (Windows) or CMD-Click (Mac) to de/select",
        multiple: true
      }))), this.canRenderField(META_KEY_MAP.cardOptions) && /*#__PURE__*/react_default.a.createElement(external_wp_editPost_["PluginDocumentSettingPanel"], {
        name: "trevor-entry-card-options",
        icon: "admin-settings",
        title: "Card Options"
      }, /*#__PURE__*/react_default.a.createElement(external_wp_components_["CheckboxControl"], {
        label: "Show Eyebrow on Card",
        checked: showCardEyebrow,
        onChange: this.handleShowCardEyebrow
      })));
    }
  }]);

  return PostSidebar;
}(react_default.a.Component);

Object(external_wp_plugins_["registerPlugin"])('trevor-article-custom', {
  render: Object(external_wp_compose_["compose"])( // Select
  Object(external_wp_data_["withSelect"])(function (select) {
    var _select = select('core/editor'),
        getEditedPostAttribute = _select.getEditedPostAttribute,
        getCurrentPostType = _select.getCurrentPostType,
        getEditedPostSlug = _select.getEditedPostSlug;

    var postID = getEditedPostAttribute('id');
    var metaData = getEditedPostAttribute('meta') || {};
    var slug = getEditedPostSlug();
    var normalTitle = getEditedPostAttribute('title');
    var template = getEditedPostAttribute('template');
    var postType = getCurrentPostType();
    var out = {
      postID: postID,
      normalTitle: normalTitle,
      template: template,
      postType: postType,
      slug: slug
    };
    Object.keys(META_KEY_MAP).forEach(function (varName) {
      return out[varName] = metaData[META_KEY_MAP[varName]];
    });
    return out;
  }), // Dispatch
  Object(external_wp_data_["withDispatch"])(function (dispatch) {
    var _dispatch = dispatch('core/editor'),
        editPost = _dispatch.editPost;

    return {
      updatePostMeta: function updatePostMeta(metaKey, value) {
        editPost({
          meta: Object(defineProperty["a" /* default */])({}, META_KEY_MAP[metaKey], value)
        });
      },
      editPost: editPost
    };
  }))(general_PostSidebar)
});
// CONCATENATED MODULE: ./src/plugin/js/blocks/featured-images/index.js




Object(external_wp_hooks_["addFilter"])("editor.PostFeaturedImage", "trevor/wrap-post-featured-image", function (OriginalComponent) {
  return function (props) {
    var metaKeys = (TrevorWP.screen.editorBlocksData || {}).metaKeys || {};
    return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_components_["BaseControl"], {
      label: "Vertical Image"
    }, /*#__PURE__*/react_default.a.createElement(OriginalComponent, props)), metaKeys['KEY_IMAGE_HORIZONTAL'] && /*#__PURE__*/react_default.a.createElement(file, {
      key: "horizontal",
      metaKey: metaKeys['KEY_IMAGE_HORIZONTAL'],
      label: "Horizontal Image",
      allowedTypes: ['image']
    }), metaKeys['KEY_IMAGE_SQUARE'] && /*#__PURE__*/react_default.a.createElement(file, {
      key: "square",
      metaKey: metaKeys['KEY_IMAGE_SQUARE'],
      label: "Square Image",
      allowedTypes: ['image']
    }));
  };
});
// EXTERNAL MODULE: external "wp.element"
var external_wp_element_ = __webpack_require__(229);

// CONCATENATED MODULE: ./src/plugin/js/blocks/block-edit/index.js




var controllerMap = {
  'core/heading': __webpack_require__(282).default
};
Object(external_wp_hooks_["addFilter"])('editor.BlockEdit', 'trevor/block-edit', Object(external_wp_compose_["createHigherOrderComponent"])(function (BlockEdit) {
  return function (props) {
    var name = props.name;

    if (!(name in controllerMap)) {
      return /*#__PURE__*/react_default.a.createElement(BlockEdit, props);
    }

    var Controller = controllerMap[name];
    var placement = Controller.placement;
    var controller = /*#__PURE__*/react_default.a.createElement(Controller, props);
    return /*#__PURE__*/react_default.a.createElement(external_wp_element_["Fragment"], null, placement === 'top' && controller, /*#__PURE__*/react_default.a.createElement(BlockEdit, props), placement !== 'top' && controller);
  };
}, 'trevorBlockEdit'));
// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/objectDestructuringEmpty.js
var objectDestructuringEmpty = __webpack_require__(46);

// EXTERNAL MODULE: ./src/plugin/js/main/utils/index.js + 4 modules
var utils = __webpack_require__(27);

// CONCATENATED MODULE: ./src/plugin/js/blocks/main-category/index.js







var main_category_temp;







var main_category_TrevorWP$screen$edit = TrevorWP.screen.editorBlocksData,
    main_category_editorBlocksData = main_category_TrevorWP$screen$edit === void 0 ? {} : main_category_TrevorWP$screen$edit;
var main_category_editorBlocksData$met = main_category_editorBlocksData.metaKeys,
    main_category_metaKeys = main_category_editorBlocksData$met === void 0 ? {} : main_category_editorBlocksData$met,
    catTax = main_category_editorBlocksData.catTax;
var MAIN_CAT_META_KEY = main_category_metaKeys.KEY_MAIN_CATEGORY;
var fCatCache = null;
var MainCategoryInput = Object(external_wp_compose_["compose"])(Object(external_wp_data_["withSelect"])(function (select) {
  var _select = select('core/editor'),
      getEditedPostAttribute = _select.getEditedPostAttribute;

  var postID = getEditedPostAttribute('id');
  var cats = getEditedPostAttribute(catTax === 'category' ? 'categories' : catTax) || [];
  var metaData = getEditedPostAttribute('meta');
  var mainCat = metaData[MAIN_CAT_META_KEY];
  var allCats = wp.data.select('core').getEntityRecords('taxonomy', catTax, {
    per_page: -1,
    include: cats
  }) || [];
  return {
    postID: postID,
    cats: cats,
    allCats: allCats,
    mainCat: mainCat
  };
}), Object(external_wp_data_["withDispatch"])(function (dispatch) {
  var _dispatch = dispatch('core/editor'),
      editPost = _dispatch.editPost;

  return {
    editPost: editPost
  };
}))((main_category_temp = /*#__PURE__*/function (_React$Component) {
  Object(inherits["a" /* default */])(_temp, _React$Component);

  var _super = Object(createSuper["a" /* default */])(_temp);

  function _temp() {
    var _this;

    Object(classCallCheck["a" /* default */])(this, _temp);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _this.handleChange = function (selected) {
      return _this.setMainCat(parseInt(selected));
    };

    _this.setMainCat = function (cat) {
      return _this.props.editPost({
        meta: Object(defineProperty["a" /* default */])({}, MAIN_CAT_META_KEY, fCatCache = cat)
      });
    };

    return _this;
  }

  Object(createClass["a" /* default */])(_temp, [{
    key: "componentDidUpdate",
    value: function componentDidUpdate(_ref) {
      Object(objectDestructuringEmpty["a" /* default */])(_ref);

      var _this$props = this.props,
          cats = _this$props.cats,
          mainCat = _this$props.mainCat;

      if (mainCat) {
        if (cats.length === 0) {
          // No categories left
          this.setMainCat(0);
        } else if (-1 === cats.indexOf(mainCat)) {
          // Prev is deleted, pick the first one
          this.setMainCat(cats[0]);
        }
      } else {
        if (cats.length) {
          // Pick the first one
          this.setMainCat(cats[0]);
        }
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props2 = this.props,
          OriginalComponent = _this$props2.OriginalComponent,
          originalProps = _this$props2.originalProps;
      return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(OriginalComponent, Object.assign({}, originalProps, {
        terms: originalProps.terms
      })), this.renderInput());
    }
  }, {
    key: "renderInput",
    value: function renderInput() {
      var _this$props3 = this.props,
          allCats = _this$props3.allCats,
          mainCat = _this$props3.mainCat;

      if (allCats.length < 2) {
        return null;
      }

      return /*#__PURE__*/react_default.a.createElement(external_wp_components_["SelectControl"], {
        label: "Main Category",
        value: mainCat,
        options: allCats.map(function (cat) {
          return {
            label: Object(utils["htmlDecode"])(cat.name),
            value: cat.id
          };
        }),
        onChange: this.handleChange
      });
    }
  }]);

  return _temp;
}(react_default.a.Component), main_category_temp));
Object(external_wp_hooks_["addFilter"])('editor.PostTaxonomyType', 'trvr/main-category', function (OriginalComponent) {
  return function (originalProps) {
    if (originalProps && originalProps.slug === catTax && -1 === ['post_tag'].indexOf(originalProps.slug)) {
      return /*#__PURE__*/react_default.a.createElement(MainCategoryInput, {
        originalProps: originalProps,
        OriginalComponent: OriginalComponent
      });
    } else {
      return /*#__PURE__*/react_default.a.createElement(OriginalComponent, originalProps);
    }
  };
});
// EXTERNAL MODULE: external "wp.blocks"
var external_wp_blocks_ = __webpack_require__(30);

// CONCATENATED MODULE: ./node_modules/@svgr/webpack/lib!./src/assets/book-solid.svg
function _extends() { _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return _extends.apply(this, arguments); }



var book_solid_ref = /*#__PURE__*/react_default.a.createElement("path", {
  fill: "currentColor",
  d: "M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"
});

var book_solid_SvgBookSolid = function SvgBookSolid(props) {
  return /*#__PURE__*/react_default.a.createElement("svg", _extends({
    "aria-hidden": "true",
    "data-prefix": "fas",
    "data-icon": "book",
    className: "book-solid_svg__svg-inline--fa book-solid_svg__fa-book book-solid_svg__fa-w-14",
    viewBox: "0 0 448 512"
  }, props), book_solid_ref);
};

/* harmony default export */ var book_solid = (book_solid_SvgBookSolid);
// EXTERNAL MODULE: ./node_modules/babel-preset-react-app/node_modules/@babel/runtime/helpers/esm/objectSpread2.js
var objectSpread2 = __webpack_require__(9);

// EXTERNAL MODULE: external "jQuery"
var external_jQuery_ = __webpack_require__(0);
var external_jQuery_default = /*#__PURE__*/__webpack_require__.n(external_jQuery_);

// CONCATENATED MODULE: ./src/plugin/js/blocks/fields/auto-complete.js








var auto_complete_AutoCompleteField = /*#__PURE__*/function (_React$Component) {
  Object(inherits["a" /* default */])(AutoCompleteField, _React$Component);

  var _super = Object(createSuper["a" /* default */])(AutoCompleteField);

  function AutoCompleteField() {
    var _this;

    Object(classCallCheck["a" /* default */])(this, AutoCompleteField);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));
    _this.inputRef = react_default.a.createRef();
    return _this;
  }

  Object(createClass["a" /* default */])(AutoCompleteField, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this$props = this.props,
          autoCompleter = _this$props.autoCompleter,
          onSelect = _this$props.onSelect; // Initiate auto complete

      this._get$input().autocomplete({
        source: autoCompleter,
        select: function select(event, _ref) {
          var item = _ref.item;
          onSelect(item); // item.label && item.value
        }
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this$props2 = this.props,
          id = _this$props2.id,
          label = _this$props2.label,
          help = _this$props2.help;
      return /*#__PURE__*/react_default.a.createElement(external_wp_components_["BaseControl"], {
        id: id,
        label: label,
        help: help,
        className: "widefat"
      }, /*#__PURE__*/react_default.a.createElement("input", {
        type: "text",
        className: "widefat",
        ref: this.inputRef,
        autoComplete: "off"
      }));
    }
  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      this._get$input().autocomplete("destroy");
    }
  }, {
    key: "_get$input",
    value: function _get$input() {
      return external_jQuery_default()(this.inputRef.current);
    }
  }]);

  return AutoCompleteField;
}(react_default.a.Component);


// CONCATENATED MODULE: ./src/plugin/js/blocks/fields/index.js


// EXTERNAL MODULE: ./src/plugin/js/blocks/misc/post-auto-completer.js
var post_auto_completer = __webpack_require__(47);

// CONCATENATED MODULE: ./src/plugin/js/blocks/block-glossary_entry/edit.js












var edit_default = /*#__PURE__*/function (_React$Component) {
  Object(inherits["a" /* default */])(_default, _React$Component);

  var _super = Object(createSuper["a" /* default */])(_default);

  function _default() {
    var _this;

    Object(classCallCheck["a" /* default */])(this, _default);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _this.resetMeta = function () {
      return _this.props.setAttributes({
        meta: {}
      });
    };

    _this.metaChangeHandler = function (metaKey) {
      return function (e) {
        _this.props.setAttributes({
          meta: Object(objectSpread2["a" /* default */])(Object(objectSpread2["a" /* default */])({}, _this.props.attributes.meta), {}, Object(defineProperty["a" /* default */])({}, metaKey, e.target ? e.target.value : e))
        });
      };
    };

    _this.onArticleSelect = function (_ref) {
      var label = _ref.label,
          value = _ref.value;

      _this.metaChangeHandler('id')(value);

      _this.metaChangeHandler('title')(label);
    };

    return _this;
  }

  Object(createClass["a" /* default */])(_default, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          _this$props$attribute = _this$props.attributes;
      _this$props$attribute = _this$props$attribute === void 0 ? {} : _this$props$attribute;
      var _this$props$attribute2 = _this$props$attribute.meta;
      _this$props$attribute2 = _this$props$attribute2 === void 0 ? {} : _this$props$attribute2;
      var id = _this$props$attribute2.id,
          title = _this$props$attribute2.title,
          panelTitle = _this$props.panelTitle,
          apiOptions = _this$props.apiOptions,
          className = _this$props.className;
      return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["InspectorControls"], null, /*#__PURE__*/react_default.a.createElement(external_wp_components_["PanelBody"], {
        title: panelTitle,
        icon: "media-document",
        initialOpen: true
      }, /*#__PURE__*/react_default.a.createElement(external_wp_components_["PanelRow"], null, id ? /*#__PURE__*/react_default.a.createElement(external_wp_components_["BaseControl"], {
        label: "Selected",
        className: "widefat"
      }, /*#__PURE__*/react_default.a.createElement("br", null), /*#__PURE__*/react_default.a.createElement("a", {
        href: "#",
        title: "Click to change",
        onClick: this.resetMeta
      }, /*#__PURE__*/react_default.a.createElement("span", null, "#", id), "\xA0", /*#__PURE__*/react_default.a.createElement("strong", null, title))) : /*#__PURE__*/react_default.a.createElement(auto_complete_AutoCompleteField, {
        label: "Entry",
        help: "Please start to type to search.",
        autoCompleter: Object(post_auto_completer["a" /* default */])('Trevor_rc_glossary', apiOptions),
        onSelect: this.onArticleSelect
      })))), /*#__PURE__*/react_default.a.createElement("div", {
        className: className
      }, id ? /*#__PURE__*/react_default.a.createElement("div", null, "Glossary: ", /*#__PURE__*/react_default.a.createElement("span", null, "#", id), " ", /*#__PURE__*/react_default.a.createElement("strong", null, title)) : /*#__PURE__*/react_default.a.createElement("em", null, "No item selected.")));
    }
  }]);

  return _default;
}(react_default.a.Component);


// CONCATENATED MODULE: ./src/plugin/js/blocks/block-glossary_entry/index.js




 // Register

/* harmony default export */ var block_glossary_entry = (Object(external_wp_blocks_["registerBlockType"])('trevor/glossary-entry', {
  title: 'Glossary Item (Trevor)',
  icon: book_solid,
  category: 'trevor',
  attributes: {
    meta: {
      type: 'object',
      default: {}
    }
  },
  edit: edit_default,
  save: function save() {
    return /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["InnerBlocks"].Content, null);
  }
}));
// CONCATENATED MODULE: ./node_modules/@svgr/webpack/lib!./src/assets/clipboard-list-solid.svg
function clipboard_list_solid_extends() { clipboard_list_solid_extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return clipboard_list_solid_extends.apply(this, arguments); }



var clipboard_list_solid_ref = /*#__PURE__*/react_default.a.createElement("path", {
  fill: "currentColor",
  d: "M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"
});

var clipboard_list_solid_SvgClipboardListSolid = function SvgClipboardListSolid(props) {
  return /*#__PURE__*/react_default.a.createElement("svg", clipboard_list_solid_extends({
    "aria-hidden": "true",
    "data-prefix": "fas",
    "data-icon": "clipboard-list",
    className: "clipboard-list-solid_svg__svg-inline--fa clipboard-list-solid_svg__fa-clipboard-list clipboard-list-solid_svg__fa-w-12",
    viewBox: "0 0 384 512"
  }, props), clipboard_list_solid_ref);
};

/* harmony default export */ var clipboard_list_solid = (clipboard_list_solid_SvgClipboardListSolid);
// CONCATENATED MODULE: ./node_modules/@svgr/webpack/lib!./src/assets/link-solid.svg
function link_solid_extends() { link_solid_extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return link_solid_extends.apply(this, arguments); }



var link_solid_ref = /*#__PURE__*/react_default.a.createElement("path", {
  fill: "currentColor",
  d: "M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 01-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0120.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0020.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 00-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z"
});

var link_solid_SvgLinkSolid = function SvgLinkSolid(props) {
  return /*#__PURE__*/react_default.a.createElement("svg", link_solid_extends({
    "aria-hidden": "true",
    "data-prefix": "fas",
    "data-icon": "link",
    className: "link-solid_svg__svg-inline--fa link-solid_svg__fa-link link-solid_svg__fa-w-16",
    viewBox: "0 0 512 512"
  }, props), link_solid_ref);
};

/* harmony default export */ var link_solid = (link_solid_SvgLinkSolid);
// CONCATENATED MODULE: ./src/plugin/js/blocks/link-list/list-item/edit.js








var list_item_edit_default = /*#__PURE__*/function (_React$Component) {
  Object(inherits["a" /* default */])(_default, _React$Component);

  var _super = Object(createSuper["a" /* default */])(_default);

  function _default() {
    var _this;

    Object(classCallCheck["a" /* default */])(this, _default);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _this.handleTitleChange = function (title) {
      return _this.props.setAttributes({
        title: title
      });
    };

    _this.handleUrlChange = function (url) {
      return _this.props.setAttributes({
        url: url
      });
    };

    return _this;
  }

  Object(createClass["a" /* default */])(_default, [{
    key: "render",
    value: function render() {
      var className = this.props.className;
      return /*#__PURE__*/react_default.a.createElement("div", {
        className: className
      }, /*#__PURE__*/react_default.a.createElement("div", {
        className: "inner-wrapper"
      }, this.renderContentContainer()));
    }
  }, {
    key: "renderContentContainer",
    value: function renderContentContainer() {
      var _this$props = this.props,
          isSelected = _this$props.isSelected,
          _this$props$attribute = _this$props.attributes,
          title = _this$props$attribute.title,
          url = _this$props$attribute.url;

      if (isSelected) {
        return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
          type: "text",
          placeholder: "Title",
          label: "Title",
          defaultValue: title,
          autoComplete: "off",
          onChange: this.handleTitleChange,
          required: true
        }), /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
          value: url,
          placeholder: "https://",
          label: "Url",
          type: "url",
          autoComplete: "off",
          onChange: this.handleUrlChange,
          required: true
        }));
      } else {
        return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement("a", {
          href: url,
          target: "_blank",
          rel: "noopener noreferrer nofollow"
        }, /*#__PURE__*/react_default.a.createElement("h7", null, title || /*#__PURE__*/react_default.a.createElement("em", null, "No title"))));
      }
    }
  }]);

  return _default;
}(react_default.a.Component);


// CONCATENATED MODULE: ./src/plugin/js/blocks/link-list/list-item/index.js




var NAME = "trevor/link-list--item";
/* harmony default export */ var list_item = (Object(external_wp_blocks_["registerBlockType"])(NAME, {
  title: 'Link-list Item',
  icon: link_solid,
  category: 'trevor',
  attributes: {
    title: {
      type: 'string'
    },
    url: {
      type: 'url'
    }
  },
  parent: ["trevor/link-list"],
  edit: list_item_edit_default
}));
// CONCATENATED MODULE: ./src/plugin/js/blocks/link-list/edit.js








var ALLOWED_BLOCKS = [NAME];

var link_list_edit_default = /*#__PURE__*/function (_React$Component) {
  Object(inherits["a" /* default */])(_default, _React$Component);

  var _super = Object(createSuper["a" /* default */])(_default);

  function _default() {
    var _this;

    Object(classCallCheck["a" /* default */])(this, _default);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _this.handleTitleChange = function (title) {
      return _this.props.setAttributes({
        title: title
      });
    };

    _this.handleCaptionChange = function (caption) {
      return _this.props.setAttributes({
        caption: caption
      });
    };

    return _this;
  }

  Object(createClass["a" /* default */])(_default, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          isSelected = _this$props.isSelected,
          className = _this$props.className,
          title = _this$props.attributes.title;
      return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["InspectorControls"], null, /*#__PURE__*/react_default.a.createElement("div", {
        style: {
          padding: 16
        }
      }, /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
        label: "Title",
        value: title,
        onChange: this.handleTitleChange,
        autoComplete: "off"
      }))), /*#__PURE__*/react_default.a.createElement("div", {
        className: className
      }, isSelected ? /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
        label: "List Title",
        placeholder: "List Title",
        value: title,
        onChange: this.handleTitleChange,
        autoComplete: "off",
        type: "text"
      })) : /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement("strong", null, title || /*#__PURE__*/react_default.a.createElement("em", null, "No title"))), /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["InnerBlocks"], {
        allowedBlocks: ALLOWED_BLOCKS,
        template: [[NAME, {}], [NAME, {}]],
        templateLock: false
      })));
    }
  }]);

  return _default;
}(react_default.a.Component);


// CONCATENATED MODULE: ./src/plugin/js/blocks/link-list/index.js




 // Child

 // Register

/* harmony default export */ var link_list = (Object(external_wp_blocks_["registerBlockType"])('trevor/link-list', {
  title: 'Link List (Trevor)',
  icon: clipboard_list_solid,
  category: 'trevor',
  attributes: {
    title: {
      type: 'string'
    }
  },
  edit: link_list_edit_default,
  save: function save() {
    return /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["InnerBlocks"].Content, null);
  }
}));
// CONCATENATED MODULE: ./node_modules/@svgr/webpack/lib!./src/assets/to-do-list.svg
function to_do_list_extends() { to_do_list_extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; }; return to_do_list_extends.apply(this, arguments); }



var to_do_list_ref = /*#__PURE__*/react_default.a.createElement("path", {
  d: "M388 460a4 4 0 004-4V64a4 4 0 00-8 0v392a4 4 0 004 4zM372 60a4 4 0 00-4 4v392a4 4 0 008 0V64a4 4 0 00-4-4zM108 180h24c6.624-.007 11.993-5.376 12-12v-24a11.897 11.897 0 00-1.183-5.16l8.011-8.011a4 4 0 10-5.657-5.656l-8.011 8.011a11.9 11.9 0 00-5.16-1.183h-24c-6.624.007-11.993 5.376-12 12v24c.007 6.623 5.376 11.992 12 11.999zm-4-36a4.004 4.004 0 014-4h22.343l-17.172 17.172a4 4 0 005.656 5.658l.002-.002L136 145.657V168a4.004 4.004 0 01-4 4h-24a4.004 4.004 0 01-4-4zM108 260h24c6.624-.007 11.993-5.376 12-12v-24a11.897 11.897 0 00-1.183-5.16l8.011-8.011a4 4 0 10-5.657-5.656l-8.011 8.011a11.9 11.9 0 00-5.16-1.183h-24c-6.624.007-11.993 5.376-12 12v24c.007 6.623 5.376 11.992 12 11.999zm-4-36a4.004 4.004 0 014-4h22.343l-17.172 17.172a4 4 0 005.657 5.657L136 225.657V248a4.004 4.004 0 01-4 4h-24a4.004 4.004 0 01-4-4zM108 340h24c6.624-.007 11.993-5.376 12-12v-24a11.897 11.897 0 00-1.183-5.16l8.011-8.011a4 4 0 00-5.657-5.657l-8.011 8.011A11.9 11.9 0 00132 292h-24c-6.624.007-11.993 5.376-12 12v24c.007 6.624 5.376 11.993 12 12zm-4-36a4.004 4.004 0 014-4h22.343l-17.172 17.172a4 4 0 005.657 5.657L136 305.657V328a4.004 4.004 0 01-4 4h-24a4.004 4.004 0 01-4-4zM108 420h24c6.624-.007 11.993-5.376 12-12v-24c-.007-6.624-5.376-11.993-12-12h-24c-6.624.007-11.993 5.376-12 12v24c.007 6.624 5.376 11.993 12 12zm-4-36a4.004 4.004 0 014-4h24a4.004 4.004 0 014 4v24a4.004 4.004 0 01-4 4h-24a4.004 4.004 0 01-4-4z"
});

var to_do_list_ref2 = /*#__PURE__*/react_default.a.createElement("path", {
  d: "M380 40h-32.147C346.194 17.604 330.748 0 312 0c-13.914 0-26.01 9.698-32 23.854C274.01 9.698 261.914 0 248 0s-26.01 9.698-32 23.854C210.01 9.698 197.914 0 184 0s-26.01 9.698-32 23.854C146.01 9.698 133.914 0 120 0c-19.851 0-36 19.738-36 44l.001.292A31.881 31.881 0 0068 72v376c.02 17.665 14.335 31.98 32 32h280c17.665-.02 31.98-14.335 32-32V72c-.02-17.665-14.335-31.98-32-32zM89.267 55.116c2.323 10.018 7.699 18.424 14.784 23.539-.024.448-.051.896-.051 1.345 0 11.028 7.178 20 16 20s16-8.972 16-20a24.884 24.884 0 00-.285-3.698 4.172 4.172 0 00-.033-.271C134.204 66.898 127.735 60 120 60c-2.555 0-5.31-3.138-6.828-8h39.472c1.856 11.385 7.597 21.018 15.407 26.655-.024.448-.051.896-.051 1.345 0 11.028 7.178 20 16 20s16-8.972 16-20a24.884 24.884 0 00-.285-3.698 4.172 4.172 0 00-.033-.271C198.204 66.898 191.735 60 184 60c-2.555 0-5.31-3.138-6.828-8h39.472c1.856 11.385 7.597 21.018 15.407 26.655-.024.448-.051.896-.051 1.345 0 11.028 7.178 20 16 20s16-8.972 16-20a24.884 24.884 0 00-.285-3.698 4.172 4.172 0 00-.033-.271C262.204 66.898 255.735 60 248 60c-2.555 0-5.31-3.138-6.828-8h39.472c1.856 11.385 7.597 21.018 15.407 26.655-.024.448-.051.896-.051 1.345 0 11.028 7.178 20 16 20s16-8.972 16-20a24.884 24.884 0 00-.285-3.698 4.172 4.172 0 00-.033-.271C326.204 66.898 319.735 60 312 60c-2.555 0-5.31-3.138-6.828-8H332c11.041.012 19.988 8.959 20 20v376c-.012 11.041-8.959 19.988-20 20H100c-11.041-.012-19.988-8.959-20-20V72a19.999 19.999 0 019.267-16.884zM120 12c13.233 0 24 14.355 24 32h-8c0-13.458-7.028-24-16-24s-16 10.542-16 24 7.028 24 16 24c3.039 0 5.743 2.704 7.091 6.559A18.316 18.316 0 01120 76c-13.233 0-24-14.355-24-32s10.767-32 24-32zm3.684 28h-7.368c.761-4.648 2.707-7.421 3.684-7.953.978.532 2.923 3.305 3.684 7.953zm4.074 42.814C126.887 88.012 123.692 92 120 92c-3.694 0-6.891-3.993-7.76-9.196a25.87 25.87 0 0015.518.01zM200 44c0-13.458-7.028-24-16-24s-16 10.542-16 24 7.028 24 16 24c3.039 0 5.743 2.704 7.091 6.559A18.316 18.316 0 01184 76c-13.233 0-24-14.355-24-32s10.767-32 24-32 24 14.355 24 32zm-12.316-4h-7.368c.761-4.648 2.707-7.421 3.684-7.953.978.532 2.923 3.305 3.684 7.953zm4.074 42.814C190.887 88.012 187.692 92 184 92c-3.694 0-6.891-3.993-7.76-9.196a25.87 25.87 0 0015.518.01zM248 12c13.233 0 24 14.355 24 32h-8c0-13.458-7.028-24-16-24s-16 10.542-16 24 7.028 24 16 24c3.039 0 5.743 2.704 7.091 6.559A18.316 18.316 0 01248 76c-13.233 0-24-14.355-24-32s10.767-32 24-32zm3.684 28h-7.368c.761-4.648 2.707-7.421 3.684-7.953.978.532 2.923 3.305 3.684 7.953zm4.074 42.814C254.887 88.012 251.692 92 248 92c-3.694 0-6.891-3.993-7.76-9.196a25.87 25.87 0 0015.518.01zM312 12c13.233 0 24 14.355 24 32h-8c0-13.458-7.028-24-16-24s-16 10.542-16 24 7.028 24 16 24c3.039 0 5.743 2.704 7.091 6.559A18.316 18.316 0 01312 76c-13.233 0-24-14.355-24-32s10.767-32 24-32zm3.684 28h-7.368c.761-4.648 2.707-7.421 3.684-7.953.978.532 2.923 3.305 3.684 7.953zm4.074 42.814C318.887 88.012 315.692 92 312 92c-3.694 0-6.891-3.993-7.76-9.196a25.87 25.87 0 0015.518.01zM360 448V72a27.909 27.909 0 00-8.431-20H380c11.041.012 19.988 8.959 20 20v376c-.012 11.041-8.959 19.988-20 20h-28.431A27.909 27.909 0 00360 448z"
});

var to_do_list_ref3 = /*#__PURE__*/react_default.a.createElement("path", {
  d: "M196 148h-32a4 4 0 010-8h32a4 4 0 010 8zM316 148h-96a4 4 0 010-8h96a4 4 0 010 8zM228 172h-64a4 4 0 010-8h64a4 4 0 010 8zM316 172h-64a4 4 0 010-8h64a4 4 0 010 8zM180 228h-16a4 4 0 010-8h16a4 4 0 010 8zM316 228H204a4 4 0 010-8h112a4 4 0 010 8zM236 252h-72a4 4 0 010-8h72a4 4 0 010 8zM316 252h-56a4 4 0 010-8h56a4 4 0 010 8zM196 308h-32a4 4 0 010-8h32a4 4 0 010 8zM316 308h-24a4 4 0 010-8h24a4 4 0 010 8zM268 308h-48a4 4 0 010-8h48a4 4 0 010 8zM196 332h-32a4 4 0 010-8h32a4 4 0 010 8zM292 332h-72a4 4 0 010-8h72a4 4 0 010 8zM196 388h-32a4 4 0 010-8h32a4 4 0 010 8zM316 388h-96a4 4 0 010-8h96a4 4 0 010 8zM228 412h-24a4 4 0 010-8h24a4 4 0 010 8zM180 412h-16a4 4 0 010-8h16a4 4 0 010 8zM316 412h-64a4 4 0 010-8h64a4 4 0 010 8z"
});

var to_do_list_SvgToDoList = function SvgToDoList(props) {
  return /*#__PURE__*/react_default.a.createElement("svg", to_do_list_extends({
    height: 512,
    viewBox: "0 0 480 480",
    width: 512
  }, props), to_do_list_ref, to_do_list_ref2, to_do_list_ref3);
};

/* harmony default export */ var to_do_list = (to_do_list_SvgToDoList);
// CONCATENATED MODULE: ./src/plugin/js/blocks/bottom-list/edit.js








var bottom_list_edit_default = /*#__PURE__*/function (_React$Component) {
  Object(inherits["a" /* default */])(_default, _React$Component);

  var _super = Object(createSuper["a" /* default */])(_default);

  function _default() {
    var _this;

    Object(classCallCheck["a" /* default */])(this, _default);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _this.handleTitleChange = function (title) {
      return _this.props.setAttributes({
        title: title
      });
    };

    return _this;
  }

  Object(createClass["a" /* default */])(_default, [{
    key: "render",
    value: function render() {
      var _this$props = this.props,
          isSelected = _this$props.isSelected,
          className = _this$props.className,
          title = _this$props.attributes.title;
      return /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["InspectorControls"], null, /*#__PURE__*/react_default.a.createElement("div", {
        style: {
          padding: 16
        }
      }, /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
        label: "Title",
        value: title,
        onChange: this.handleTitleChange,
        autoComplete: "off"
      }))), /*#__PURE__*/react_default.a.createElement("div", {
        className: className
      }, isSelected ? /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement(external_wp_components_["TextControl"], {
        label: "List Title",
        placeholder: "List Title",
        value: title,
        onChange: this.handleTitleChange,
        autoComplete: "off",
        type: "text"
      })) : /*#__PURE__*/react_default.a.createElement(react_default.a.Fragment, null, /*#__PURE__*/react_default.a.createElement("strong", null, title || /*#__PURE__*/react_default.a.createElement("em", null, "No title"))), /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["InnerBlocks"], {
        allowedBlocks: ['core/list'],
        template: [['core/list', {}]],
        templateLock: true
      })));
    }
  }]);

  return _default;
}(react_default.a.Component);


// CONCATENATED MODULE: ./src/plugin/js/blocks/bottom-list/index.js




 // Register

/* harmony default export */ var bottom_list = (Object(external_wp_blocks_["registerBlockType"])('trevor/bottom-list', {
  title: 'Bottom List (Trevor)',
  icon: to_do_list,
  category: 'trevor',
  attributes: {
    title: {
      type: 'text',
      default: ''
    }
  },
  edit: bottom_list_edit_default,
  save: function save() {
    return /*#__PURE__*/react_default.a.createElement(external_wp_blockEditor_["InnerBlocks"].Content, null);
  }
}));
// CONCATENATED MODULE: ./src/plugin/js/blocks/index.js
// Block Styles
 // General & Document Items





 // Editor Blocks





/***/ })
],[[378,0]]]);
//# sourceMappingURL=blocks.js.map