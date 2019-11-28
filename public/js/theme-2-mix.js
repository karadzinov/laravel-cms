function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*! jQuery v3.3.1 | (c) JS Foundation and other contributors | jquery.org/license */
!function (e, t) {
  "use strict";

  "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && "object" == _typeof(module.exports) ? module.exports = e.document ? t(e, !0) : function (e) {
    if (!e.document) throw new Error("jQuery requires a window with a document");
    return t(e);
  } : t(e);
}("undefined" != typeof window ? window : this, function (e, t) {
  "use strict";

  var n = [],
      r = e.document,
      i = Object.getPrototypeOf,
      o = n.slice,
      a = n.concat,
      s = n.push,
      u = n.indexOf,
      l = {},
      c = l.toString,
      f = l.hasOwnProperty,
      p = f.toString,
      d = p.call(Object),
      h = {},
      g = function e(t) {
    return "function" == typeof t && "number" != typeof t.nodeType;
  },
      y = function e(t) {
    return null != t && t === t.window;
  },
      v = {
    type: !0,
    src: !0,
    noModule: !0
  };

  function m(e, t, n) {
    var i,
        o = (t = t || r).createElement("script");
    if (o.text = e, n) for (i in v) {
      n[i] && (o[i] = n[i]);
    }
    t.head.appendChild(o).parentNode.removeChild(o);
  }

  function x(e) {
    return null == e ? e + "" : "object" == _typeof(e) || "function" == typeof e ? l[c.call(e)] || "object" : _typeof(e);
  }

  var b = "3.3.1",
      w = function w(e, t) {
    return new w.fn.init(e, t);
  },
      T = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;

  w.fn = w.prototype = {
    jquery: "3.3.1",
    constructor: w,
    length: 0,
    toArray: function toArray() {
      return o.call(this);
    },
    get: function get(e) {
      return null == e ? o.call(this) : e < 0 ? this[e + this.length] : this[e];
    },
    pushStack: function pushStack(e) {
      var t = w.merge(this.constructor(), e);
      return t.prevObject = this, t;
    },
    each: function each(e) {
      return w.each(this, e);
    },
    map: function map(e) {
      return this.pushStack(w.map(this, function (t, n) {
        return e.call(t, n, t);
      }));
    },
    slice: function slice() {
      return this.pushStack(o.apply(this, arguments));
    },
    first: function first() {
      return this.eq(0);
    },
    last: function last() {
      return this.eq(-1);
    },
    eq: function eq(e) {
      var t = this.length,
          n = +e + (e < 0 ? t : 0);
      return this.pushStack(n >= 0 && n < t ? [this[n]] : []);
    },
    end: function end() {
      return this.prevObject || this.constructor();
    },
    push: s,
    sort: n.sort,
    splice: n.splice
  }, w.extend = w.fn.extend = function () {
    var e,
        t,
        n,
        r,
        i,
        o,
        a = arguments[0] || {},
        s = 1,
        u = arguments.length,
        l = !1;

    for ("boolean" == typeof a && (l = a, a = arguments[s] || {}, s++), "object" == _typeof(a) || g(a) || (a = {}), s === u && (a = this, s--); s < u; s++) {
      if (null != (e = arguments[s])) for (t in e) {
        n = a[t], a !== (r = e[t]) && (l && r && (w.isPlainObject(r) || (i = Array.isArray(r))) ? (i ? (i = !1, o = n && Array.isArray(n) ? n : []) : o = n && w.isPlainObject(n) ? n : {}, a[t] = w.extend(l, o, r)) : void 0 !== r && (a[t] = r));
      }
    }

    return a;
  }, w.extend({
    expando: "jQuery" + ("3.3.1" + Math.random()).replace(/\D/g, ""),
    isReady: !0,
    error: function error(e) {
      throw new Error(e);
    },
    noop: function noop() {},
    isPlainObject: function isPlainObject(e) {
      var t, n;
      return !(!e || "[object Object]" !== c.call(e)) && (!(t = i(e)) || "function" == typeof (n = f.call(t, "constructor") && t.constructor) && p.call(n) === d);
    },
    isEmptyObject: function isEmptyObject(e) {
      var t;

      for (t in e) {
        return !1;
      }

      return !0;
    },
    globalEval: function globalEval(e) {
      m(e);
    },
    each: function each(e, t) {
      var n,
          r = 0;

      if (C(e)) {
        for (n = e.length; r < n; r++) {
          if (!1 === t.call(e[r], r, e[r])) break;
        }
      } else for (r in e) {
        if (!1 === t.call(e[r], r, e[r])) break;
      }

      return e;
    },
    trim: function trim(e) {
      return null == e ? "" : (e + "").replace(T, "");
    },
    makeArray: function makeArray(e, t) {
      var n = t || [];
      return null != e && (C(Object(e)) ? w.merge(n, "string" == typeof e ? [e] : e) : s.call(n, e)), n;
    },
    inArray: function inArray(e, t, n) {
      return null == t ? -1 : u.call(t, e, n);
    },
    merge: function merge(e, t) {
      for (var n = +t.length, r = 0, i = e.length; r < n; r++) {
        e[i++] = t[r];
      }

      return e.length = i, e;
    },
    grep: function grep(e, t, n) {
      for (var r, i = [], o = 0, a = e.length, s = !n; o < a; o++) {
        (r = !t(e[o], o)) !== s && i.push(e[o]);
      }

      return i;
    },
    map: function map(e, t, n) {
      var r,
          i,
          o = 0,
          s = [];
      if (C(e)) for (r = e.length; o < r; o++) {
        null != (i = t(e[o], o, n)) && s.push(i);
      } else for (o in e) {
        null != (i = t(e[o], o, n)) && s.push(i);
      }
      return a.apply([], s);
    },
    guid: 1,
    support: h
  }), "function" == typeof Symbol && (w.fn[Symbol.iterator] = n[Symbol.iterator]), w.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (e, t) {
    l["[object " + t + "]"] = t.toLowerCase();
  });

  function C(e) {
    var t = !!e && "length" in e && e.length,
        n = x(e);
    return !g(e) && !y(e) && ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e);
  }

  var E = function (e) {
    var t,
        n,
        r,
        i,
        o,
        a,
        s,
        u,
        l,
        c,
        f,
        p,
        d,
        h,
        g,
        y,
        v,
        m,
        x,
        b = "sizzle" + 1 * new Date(),
        w = e.document,
        T = 0,
        C = 0,
        E = ae(),
        k = ae(),
        S = ae(),
        D = function D(e, t) {
      return e === t && (f = !0), 0;
    },
        N = {}.hasOwnProperty,
        A = [],
        j = A.pop,
        q = A.push,
        L = A.push,
        H = A.slice,
        O = function O(e, t) {
      for (var n = 0, r = e.length; n < r; n++) {
        if (e[n] === t) return n;
      }

      return -1;
    },
        P = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
        M = "[\\x20\\t\\r\\n\\f]",
        R = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
        I = "\\[" + M + "*(" + R + ")(?:" + M + "*([*^$|!~]?=)" + M + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + R + "))|)" + M + "*\\]",
        W = ":(" + R + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + I + ")*)|.*)\\)|)",
        $ = new RegExp(M + "+", "g"),
        B = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$", "g"),
        F = new RegExp("^" + M + "*," + M + "*"),
        _ = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
        z = new RegExp("=" + M + "*([^\\]'\"]*?)" + M + "*\\]", "g"),
        X = new RegExp(W),
        U = new RegExp("^" + R + "$"),
        V = {
      ID: new RegExp("^#(" + R + ")"),
      CLASS: new RegExp("^\\.(" + R + ")"),
      TAG: new RegExp("^(" + R + "|[*])"),
      ATTR: new RegExp("^" + I),
      PSEUDO: new RegExp("^" + W),
      CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M + "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M + "*\\)|)", "i"),
      bool: new RegExp("^(?:" + P + ")$", "i"),
      needsContext: new RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M + "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)", "i")
    },
        G = /^(?:input|select|textarea|button)$/i,
        Y = /^h\d$/i,
        Q = /^[^{]+\{\s*\[native \w/,
        J = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
        K = /[+~]/,
        Z = new RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)", "ig"),
        ee = function ee(e, t, n) {
      var r = "0x" + t - 65536;
      return r !== r || n ? t : r < 0 ? String.fromCharCode(r + 65536) : String.fromCharCode(r >> 10 | 55296, 1023 & r | 56320);
    },
        te = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
        ne = function ne(e, t) {
      return t ? "\0" === e ? "\uFFFD" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e;
    },
        re = function re() {
      p();
    },
        ie = me(function (e) {
      return !0 === e.disabled && ("form" in e || "label" in e);
    }, {
      dir: "parentNode",
      next: "legend"
    });

    try {
      L.apply(A = H.call(w.childNodes), w.childNodes), A[w.childNodes.length].nodeType;
    } catch (e) {
      L = {
        apply: A.length ? function (e, t) {
          q.apply(e, H.call(t));
        } : function (e, t) {
          var n = e.length,
              r = 0;

          while (e[n++] = t[r++]) {
            ;
          }

          e.length = n - 1;
        }
      };
    }

    function oe(e, t, r, i) {
      var o,
          s,
          l,
          c,
          f,
          h,
          v,
          m = t && t.ownerDocument,
          T = t ? t.nodeType : 9;
      if (r = r || [], "string" != typeof e || !e || 1 !== T && 9 !== T && 11 !== T) return r;

      if (!i && ((t ? t.ownerDocument || t : w) !== d && p(t), t = t || d, g)) {
        if (11 !== T && (f = J.exec(e))) if (o = f[1]) {
          if (9 === T) {
            if (!(l = t.getElementById(o))) return r;
            if (l.id === o) return r.push(l), r;
          } else if (m && (l = m.getElementById(o)) && x(t, l) && l.id === o) return r.push(l), r;
        } else {
          if (f[2]) return L.apply(r, t.getElementsByTagName(e)), r;
          if ((o = f[3]) && n.getElementsByClassName && t.getElementsByClassName) return L.apply(r, t.getElementsByClassName(o)), r;
        }

        if (n.qsa && !S[e + " "] && (!y || !y.test(e))) {
          if (1 !== T) m = t, v = e;else if ("object" !== t.nodeName.toLowerCase()) {
            (c = t.getAttribute("id")) ? c = c.replace(te, ne) : t.setAttribute("id", c = b), s = (h = a(e)).length;

            while (s--) {
              h[s] = "#" + c + " " + ve(h[s]);
            }

            v = h.join(","), m = K.test(e) && ge(t.parentNode) || t;
          }
          if (v) try {
            return L.apply(r, m.querySelectorAll(v)), r;
          } catch (e) {} finally {
            c === b && t.removeAttribute("id");
          }
        }
      }

      return u(e.replace(B, "$1"), t, r, i);
    }

    function ae() {
      var e = [];

      function t(n, i) {
        return e.push(n + " ") > r.cacheLength && delete t[e.shift()], t[n + " "] = i;
      }

      return t;
    }

    function se(e) {
      return e[b] = !0, e;
    }

    function ue(e) {
      var t = d.createElement("fieldset");

      try {
        return !!e(t);
      } catch (e) {
        return !1;
      } finally {
        t.parentNode && t.parentNode.removeChild(t), t = null;
      }
    }

    function le(e, t) {
      var n = e.split("|"),
          i = n.length;

      while (i--) {
        r.attrHandle[n[i]] = t;
      }
    }

    function ce(e, t) {
      var n = t && e,
          r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
      if (r) return r;
      if (n) while (n = n.nextSibling) {
        if (n === t) return -1;
      }
      return e ? 1 : -1;
    }

    function fe(e) {
      return function (t) {
        return "input" === t.nodeName.toLowerCase() && t.type === e;
      };
    }

    function pe(e) {
      return function (t) {
        var n = t.nodeName.toLowerCase();
        return ("input" === n || "button" === n) && t.type === e;
      };
    }

    function de(e) {
      return function (t) {
        return "form" in t ? t.parentNode && !1 === t.disabled ? "label" in t ? "label" in t.parentNode ? t.parentNode.disabled === e : t.disabled === e : t.isDisabled === e || t.isDisabled !== !e && ie(t) === e : t.disabled === e : "label" in t && t.disabled === e;
      };
    }

    function he(e) {
      return se(function (t) {
        return t = +t, se(function (n, r) {
          var i,
              o = e([], n.length, t),
              a = o.length;

          while (a--) {
            n[i = o[a]] && (n[i] = !(r[i] = n[i]));
          }
        });
      });
    }

    function ge(e) {
      return e && "undefined" != typeof e.getElementsByTagName && e;
    }

    n = oe.support = {}, o = oe.isXML = function (e) {
      var t = e && (e.ownerDocument || e).documentElement;
      return !!t && "HTML" !== t.nodeName;
    }, p = oe.setDocument = function (e) {
      var t,
          i,
          a = e ? e.ownerDocument || e : w;
      return a !== d && 9 === a.nodeType && a.documentElement ? (d = a, h = d.documentElement, g = !o(d), w !== d && (i = d.defaultView) && i.top !== i && (i.addEventListener ? i.addEventListener("unload", re, !1) : i.attachEvent && i.attachEvent("onunload", re)), n.attributes = ue(function (e) {
        return e.className = "i", !e.getAttribute("className");
      }), n.getElementsByTagName = ue(function (e) {
        return e.appendChild(d.createComment("")), !e.getElementsByTagName("*").length;
      }), n.getElementsByClassName = Q.test(d.getElementsByClassName), n.getById = ue(function (e) {
        return h.appendChild(e).id = b, !d.getElementsByName || !d.getElementsByName(b).length;
      }), n.getById ? (r.filter.ID = function (e) {
        var t = e.replace(Z, ee);
        return function (e) {
          return e.getAttribute("id") === t;
        };
      }, r.find.ID = function (e, t) {
        if ("undefined" != typeof t.getElementById && g) {
          var n = t.getElementById(e);
          return n ? [n] : [];
        }
      }) : (r.filter.ID = function (e) {
        var t = e.replace(Z, ee);
        return function (e) {
          var n = "undefined" != typeof e.getAttributeNode && e.getAttributeNode("id");
          return n && n.value === t;
        };
      }, r.find.ID = function (e, t) {
        if ("undefined" != typeof t.getElementById && g) {
          var n,
              r,
              i,
              o = t.getElementById(e);

          if (o) {
            if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
            i = t.getElementsByName(e), r = 0;

            while (o = i[r++]) {
              if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
            }
          }

          return [];
        }
      }), r.find.TAG = n.getElementsByTagName ? function (e, t) {
        return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0;
      } : function (e, t) {
        var n,
            r = [],
            i = 0,
            o = t.getElementsByTagName(e);

        if ("*" === e) {
          while (n = o[i++]) {
            1 === n.nodeType && r.push(n);
          }

          return r;
        }

        return o;
      }, r.find.CLASS = n.getElementsByClassName && function (e, t) {
        if ("undefined" != typeof t.getElementsByClassName && g) return t.getElementsByClassName(e);
      }, v = [], y = [], (n.qsa = Q.test(d.querySelectorAll)) && (ue(function (e) {
        h.appendChild(e).innerHTML = "<a id='" + b + "'></a><select id='" + b + "-\r\\' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && y.push("[*^$]=" + M + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || y.push("\\[" + M + "*(?:value|" + P + ")"), e.querySelectorAll("[id~=" + b + "-]").length || y.push("~="), e.querySelectorAll(":checked").length || y.push(":checked"), e.querySelectorAll("a#" + b + "+*").length || y.push(".#.+[+~]");
      }), ue(function (e) {
        e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
        var t = d.createElement("input");
        t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && y.push("name" + M + "*[*^$|!~]?="), 2 !== e.querySelectorAll(":enabled").length && y.push(":enabled", ":disabled"), h.appendChild(e).disabled = !0, 2 !== e.querySelectorAll(":disabled").length && y.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), y.push(",.*:");
      })), (n.matchesSelector = Q.test(m = h.matches || h.webkitMatchesSelector || h.mozMatchesSelector || h.oMatchesSelector || h.msMatchesSelector)) && ue(function (e) {
        n.disconnectedMatch = m.call(e, "*"), m.call(e, "[s!='']:x"), v.push("!=", W);
      }), y = y.length && new RegExp(y.join("|")), v = v.length && new RegExp(v.join("|")), t = Q.test(h.compareDocumentPosition), x = t || Q.test(h.contains) ? function (e, t) {
        var n = 9 === e.nodeType ? e.documentElement : e,
            r = t && t.parentNode;
        return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)));
      } : function (e, t) {
        if (t) while (t = t.parentNode) {
          if (t === e) return !0;
        }
        return !1;
      }, D = t ? function (e, t) {
        if (e === t) return f = !0, 0;
        var r = !e.compareDocumentPosition - !t.compareDocumentPosition;
        return r || (1 & (r = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !n.sortDetached && t.compareDocumentPosition(e) === r ? e === d || e.ownerDocument === w && x(w, e) ? -1 : t === d || t.ownerDocument === w && x(w, t) ? 1 : c ? O(c, e) - O(c, t) : 0 : 4 & r ? -1 : 1);
      } : function (e, t) {
        if (e === t) return f = !0, 0;
        var n,
            r = 0,
            i = e.parentNode,
            o = t.parentNode,
            a = [e],
            s = [t];
        if (!i || !o) return e === d ? -1 : t === d ? 1 : i ? -1 : o ? 1 : c ? O(c, e) - O(c, t) : 0;
        if (i === o) return ce(e, t);
        n = e;

        while (n = n.parentNode) {
          a.unshift(n);
        }

        n = t;

        while (n = n.parentNode) {
          s.unshift(n);
        }

        while (a[r] === s[r]) {
          r++;
        }

        return r ? ce(a[r], s[r]) : a[r] === w ? -1 : s[r] === w ? 1 : 0;
      }, d) : d;
    }, oe.matches = function (e, t) {
      return oe(e, null, null, t);
    }, oe.matchesSelector = function (e, t) {
      if ((e.ownerDocument || e) !== d && p(e), t = t.replace(z, "='$1']"), n.matchesSelector && g && !S[t + " "] && (!v || !v.test(t)) && (!y || !y.test(t))) try {
        var r = m.call(e, t);
        if (r || n.disconnectedMatch || e.document && 11 !== e.document.nodeType) return r;
      } catch (e) {}
      return oe(t, d, null, [e]).length > 0;
    }, oe.contains = function (e, t) {
      return (e.ownerDocument || e) !== d && p(e), x(e, t);
    }, oe.attr = function (e, t) {
      (e.ownerDocument || e) !== d && p(e);
      var i = r.attrHandle[t.toLowerCase()],
          o = i && N.call(r.attrHandle, t.toLowerCase()) ? i(e, t, !g) : void 0;
      return void 0 !== o ? o : n.attributes || !g ? e.getAttribute(t) : (o = e.getAttributeNode(t)) && o.specified ? o.value : null;
    }, oe.escape = function (e) {
      return (e + "").replace(te, ne);
    }, oe.error = function (e) {
      throw new Error("Syntax error, unrecognized expression: " + e);
    }, oe.uniqueSort = function (e) {
      var t,
          r = [],
          i = 0,
          o = 0;

      if (f = !n.detectDuplicates, c = !n.sortStable && e.slice(0), e.sort(D), f) {
        while (t = e[o++]) {
          t === e[o] && (i = r.push(o));
        }

        while (i--) {
          e.splice(r[i], 1);
        }
      }

      return c = null, e;
    }, i = oe.getText = function (e) {
      var t,
          n = "",
          r = 0,
          o = e.nodeType;

      if (o) {
        if (1 === o || 9 === o || 11 === o) {
          if ("string" == typeof e.textContent) return e.textContent;

          for (e = e.firstChild; e; e = e.nextSibling) {
            n += i(e);
          }
        } else if (3 === o || 4 === o) return e.nodeValue;
      } else while (t = e[r++]) {
        n += i(t);
      }

      return n;
    }, (r = oe.selectors = {
      cacheLength: 50,
      createPseudo: se,
      match: V,
      attrHandle: {},
      find: {},
      relative: {
        ">": {
          dir: "parentNode",
          first: !0
        },
        " ": {
          dir: "parentNode"
        },
        "+": {
          dir: "previousSibling",
          first: !0
        },
        "~": {
          dir: "previousSibling"
        }
      },
      preFilter: {
        ATTR: function ATTR(e) {
          return e[1] = e[1].replace(Z, ee), e[3] = (e[3] || e[4] || e[5] || "").replace(Z, ee), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4);
        },
        CHILD: function CHILD(e) {
          return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || oe.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && oe.error(e[0]), e;
        },
        PSEUDO: function PSEUDO(e) {
          var t,
              n = !e[6] && e[2];
          return V.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && X.test(n) && (t = a(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3));
        }
      },
      filter: {
        TAG: function TAG(e) {
          var t = e.replace(Z, ee).toLowerCase();
          return "*" === e ? function () {
            return !0;
          } : function (e) {
            return e.nodeName && e.nodeName.toLowerCase() === t;
          };
        },
        CLASS: function CLASS(e) {
          var t = E[e + " "];
          return t || (t = new RegExp("(^|" + M + ")" + e + "(" + M + "|$)")) && E(e, function (e) {
            return t.test("string" == typeof e.className && e.className || "undefined" != typeof e.getAttribute && e.getAttribute("class") || "");
          });
        },
        ATTR: function ATTR(e, t, n) {
          return function (r) {
            var i = oe.attr(r, e);
            return null == i ? "!=" === t : !t || (i += "", "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i.replace($, " ") + " ").indexOf(n) > -1 : "|=" === t && (i === n || i.slice(0, n.length + 1) === n + "-"));
          };
        },
        CHILD: function CHILD(e, t, n, r, i) {
          var o = "nth" !== e.slice(0, 3),
              a = "last" !== e.slice(-4),
              s = "of-type" === t;
          return 1 === r && 0 === i ? function (e) {
            return !!e.parentNode;
          } : function (t, n, u) {
            var l,
                c,
                f,
                p,
                d,
                h,
                g = o !== a ? "nextSibling" : "previousSibling",
                y = t.parentNode,
                v = s && t.nodeName.toLowerCase(),
                m = !u && !s,
                x = !1;

            if (y) {
              if (o) {
                while (g) {
                  p = t;

                  while (p = p[g]) {
                    if (s ? p.nodeName.toLowerCase() === v : 1 === p.nodeType) return !1;
                  }

                  h = g = "only" === e && !h && "nextSibling";
                }

                return !0;
              }

              if (h = [a ? y.firstChild : y.lastChild], a && m) {
                x = (d = (l = (c = (f = (p = y)[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === T && l[1]) && l[2], p = d && y.childNodes[d];

                while (p = ++d && p && p[g] || (x = d = 0) || h.pop()) {
                  if (1 === p.nodeType && ++x && p === t) {
                    c[e] = [T, d, x];
                    break;
                  }
                }
              } else if (m && (x = d = (l = (c = (f = (p = t)[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === T && l[1]), !1 === x) while (p = ++d && p && p[g] || (x = d = 0) || h.pop()) {
                if ((s ? p.nodeName.toLowerCase() === v : 1 === p.nodeType) && ++x && (m && ((c = (f = p[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] = [T, x]), p === t)) break;
              }

              return (x -= i) === r || x % r == 0 && x / r >= 0;
            }
          };
        },
        PSEUDO: function PSEUDO(e, t) {
          var n,
              i = r.pseudos[e] || r.setFilters[e.toLowerCase()] || oe.error("unsupported pseudo: " + e);
          return i[b] ? i(t) : i.length > 1 ? (n = [e, e, "", t], r.setFilters.hasOwnProperty(e.toLowerCase()) ? se(function (e, n) {
            var r,
                o = i(e, t),
                a = o.length;

            while (a--) {
              e[r = O(e, o[a])] = !(n[r] = o[a]);
            }
          }) : function (e) {
            return i(e, 0, n);
          }) : i;
        }
      },
      pseudos: {
        not: se(function (e) {
          var t = [],
              n = [],
              r = s(e.replace(B, "$1"));
          return r[b] ? se(function (e, t, n, i) {
            var o,
                a = r(e, null, i, []),
                s = e.length;

            while (s--) {
              (o = a[s]) && (e[s] = !(t[s] = o));
            }
          }) : function (e, i, o) {
            return t[0] = e, r(t, null, o, n), t[0] = null, !n.pop();
          };
        }),
        has: se(function (e) {
          return function (t) {
            return oe(e, t).length > 0;
          };
        }),
        contains: se(function (e) {
          return e = e.replace(Z, ee), function (t) {
            return (t.textContent || t.innerText || i(t)).indexOf(e) > -1;
          };
        }),
        lang: se(function (e) {
          return U.test(e || "") || oe.error("unsupported lang: " + e), e = e.replace(Z, ee).toLowerCase(), function (t) {
            var n;

            do {
              if (n = g ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-");
            } while ((t = t.parentNode) && 1 === t.nodeType);

            return !1;
          };
        }),
        target: function target(t) {
          var n = e.location && e.location.hash;
          return n && n.slice(1) === t.id;
        },
        root: function root(e) {
          return e === h;
        },
        focus: function focus(e) {
          return e === d.activeElement && (!d.hasFocus || d.hasFocus()) && !!(e.type || e.href || ~e.tabIndex);
        },
        enabled: de(!1),
        disabled: de(!0),
        checked: function checked(e) {
          var t = e.nodeName.toLowerCase();
          return "input" === t && !!e.checked || "option" === t && !!e.selected;
        },
        selected: function selected(e) {
          return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected;
        },
        empty: function empty(e) {
          for (e = e.firstChild; e; e = e.nextSibling) {
            if (e.nodeType < 6) return !1;
          }

          return !0;
        },
        parent: function parent(e) {
          return !r.pseudos.empty(e);
        },
        header: function header(e) {
          return Y.test(e.nodeName);
        },
        input: function input(e) {
          return G.test(e.nodeName);
        },
        button: function button(e) {
          var t = e.nodeName.toLowerCase();
          return "input" === t && "button" === e.type || "button" === t;
        },
        text: function text(e) {
          var t;
          return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase());
        },
        first: he(function () {
          return [0];
        }),
        last: he(function (e, t) {
          return [t - 1];
        }),
        eq: he(function (e, t, n) {
          return [n < 0 ? n + t : n];
        }),
        even: he(function (e, t) {
          for (var n = 0; n < t; n += 2) {
            e.push(n);
          }

          return e;
        }),
        odd: he(function (e, t) {
          for (var n = 1; n < t; n += 2) {
            e.push(n);
          }

          return e;
        }),
        lt: he(function (e, t, n) {
          for (var r = n < 0 ? n + t : n; --r >= 0;) {
            e.push(r);
          }

          return e;
        }),
        gt: he(function (e, t, n) {
          for (var r = n < 0 ? n + t : n; ++r < t;) {
            e.push(r);
          }

          return e;
        })
      }
    }).pseudos.nth = r.pseudos.eq;

    for (t in {
      radio: !0,
      checkbox: !0,
      file: !0,
      password: !0,
      image: !0
    }) {
      r.pseudos[t] = fe(t);
    }

    for (t in {
      submit: !0,
      reset: !0
    }) {
      r.pseudos[t] = pe(t);
    }

    function ye() {}

    ye.prototype = r.filters = r.pseudos, r.setFilters = new ye(), a = oe.tokenize = function (e, t) {
      var n,
          i,
          o,
          a,
          s,
          u,
          l,
          c = k[e + " "];
      if (c) return t ? 0 : c.slice(0);
      s = e, u = [], l = r.preFilter;

      while (s) {
        n && !(i = F.exec(s)) || (i && (s = s.slice(i[0].length) || s), u.push(o = [])), n = !1, (i = _.exec(s)) && (n = i.shift(), o.push({
          value: n,
          type: i[0].replace(B, " ")
        }), s = s.slice(n.length));

        for (a in r.filter) {
          !(i = V[a].exec(s)) || l[a] && !(i = l[a](i)) || (n = i.shift(), o.push({
            value: n,
            type: a,
            matches: i
          }), s = s.slice(n.length));
        }

        if (!n) break;
      }

      return t ? s.length : s ? oe.error(e) : k(e, u).slice(0);
    };

    function ve(e) {
      for (var t = 0, n = e.length, r = ""; t < n; t++) {
        r += e[t].value;
      }

      return r;
    }

    function me(e, t, n) {
      var r = t.dir,
          i = t.next,
          o = i || r,
          a = n && "parentNode" === o,
          s = C++;
      return t.first ? function (t, n, i) {
        while (t = t[r]) {
          if (1 === t.nodeType || a) return e(t, n, i);
        }

        return !1;
      } : function (t, n, u) {
        var l,
            c,
            f,
            p = [T, s];

        if (u) {
          while (t = t[r]) {
            if ((1 === t.nodeType || a) && e(t, n, u)) return !0;
          }
        } else while (t = t[r]) {
          if (1 === t.nodeType || a) if (f = t[b] || (t[b] = {}), c = f[t.uniqueID] || (f[t.uniqueID] = {}), i && i === t.nodeName.toLowerCase()) t = t[r] || t;else {
            if ((l = c[o]) && l[0] === T && l[1] === s) return p[2] = l[2];
            if (c[o] = p, p[2] = e(t, n, u)) return !0;
          }
        }

        return !1;
      };
    }

    function xe(e) {
      return e.length > 1 ? function (t, n, r) {
        var i = e.length;

        while (i--) {
          if (!e[i](t, n, r)) return !1;
        }

        return !0;
      } : e[0];
    }

    function be(e, t, n) {
      for (var r = 0, i = t.length; r < i; r++) {
        oe(e, t[r], n);
      }

      return n;
    }

    function we(e, t, n, r, i) {
      for (var o, a = [], s = 0, u = e.length, l = null != t; s < u; s++) {
        (o = e[s]) && (n && !n(o, r, i) || (a.push(o), l && t.push(s)));
      }

      return a;
    }

    function Te(e, t, n, r, i, o) {
      return r && !r[b] && (r = Te(r)), i && !i[b] && (i = Te(i, o)), se(function (o, a, s, u) {
        var l,
            c,
            f,
            p = [],
            d = [],
            h = a.length,
            g = o || be(t || "*", s.nodeType ? [s] : s, []),
            y = !e || !o && t ? g : we(g, p, e, s, u),
            v = n ? i || (o ? e : h || r) ? [] : a : y;

        if (n && n(y, v, s, u), r) {
          l = we(v, d), r(l, [], s, u), c = l.length;

          while (c--) {
            (f = l[c]) && (v[d[c]] = !(y[d[c]] = f));
          }
        }

        if (o) {
          if (i || e) {
            if (i) {
              l = [], c = v.length;

              while (c--) {
                (f = v[c]) && l.push(y[c] = f);
              }

              i(null, v = [], l, u);
            }

            c = v.length;

            while (c--) {
              (f = v[c]) && (l = i ? O(o, f) : p[c]) > -1 && (o[l] = !(a[l] = f));
            }
          }
        } else v = we(v === a ? v.splice(h, v.length) : v), i ? i(null, a, v, u) : L.apply(a, v);
      });
    }

    function Ce(e) {
      for (var t, n, i, o = e.length, a = r.relative[e[0].type], s = a || r.relative[" "], u = a ? 1 : 0, c = me(function (e) {
        return e === t;
      }, s, !0), f = me(function (e) {
        return O(t, e) > -1;
      }, s, !0), p = [function (e, n, r) {
        var i = !a && (r || n !== l) || ((t = n).nodeType ? c(e, n, r) : f(e, n, r));
        return t = null, i;
      }]; u < o; u++) {
        if (n = r.relative[e[u].type]) p = [me(xe(p), n)];else {
          if ((n = r.filter[e[u].type].apply(null, e[u].matches))[b]) {
            for (i = ++u; i < o; i++) {
              if (r.relative[e[i].type]) break;
            }

            return Te(u > 1 && xe(p), u > 1 && ve(e.slice(0, u - 1).concat({
              value: " " === e[u - 2].type ? "*" : ""
            })).replace(B, "$1"), n, u < i && Ce(e.slice(u, i)), i < o && Ce(e = e.slice(i)), i < o && ve(e));
          }

          p.push(n);
        }
      }

      return xe(p);
    }

    function Ee(e, t) {
      var n = t.length > 0,
          i = e.length > 0,
          o = function o(_o, a, s, u, c) {
        var f,
            h,
            y,
            v = 0,
            m = "0",
            x = _o && [],
            b = [],
            w = l,
            C = _o || i && r.find.TAG("*", c),
            E = T += null == w ? 1 : Math.random() || .1,
            k = C.length;

        for (c && (l = a === d || a || c); m !== k && null != (f = C[m]); m++) {
          if (i && f) {
            h = 0, a || f.ownerDocument === d || (p(f), s = !g);

            while (y = e[h++]) {
              if (y(f, a || d, s)) {
                u.push(f);
                break;
              }
            }

            c && (T = E);
          }

          n && ((f = !y && f) && v--, _o && x.push(f));
        }

        if (v += m, n && m !== v) {
          h = 0;

          while (y = t[h++]) {
            y(x, b, a, s);
          }

          if (_o) {
            if (v > 0) while (m--) {
              x[m] || b[m] || (b[m] = j.call(u));
            }
            b = we(b);
          }

          L.apply(u, b), c && !_o && b.length > 0 && v + t.length > 1 && oe.uniqueSort(u);
        }

        return c && (T = E, l = w), x;
      };

      return n ? se(o) : o;
    }

    return s = oe.compile = function (e, t) {
      var n,
          r = [],
          i = [],
          o = S[e + " "];

      if (!o) {
        t || (t = a(e)), n = t.length;

        while (n--) {
          (o = Ce(t[n]))[b] ? r.push(o) : i.push(o);
        }

        (o = S(e, Ee(i, r))).selector = e;
      }

      return o;
    }, u = oe.select = function (e, t, n, i) {
      var o,
          u,
          l,
          c,
          f,
          p = "function" == typeof e && e,
          d = !i && a(e = p.selector || e);

      if (n = n || [], 1 === d.length) {
        if ((u = d[0] = d[0].slice(0)).length > 2 && "ID" === (l = u[0]).type && 9 === t.nodeType && g && r.relative[u[1].type]) {
          if (!(t = (r.find.ID(l.matches[0].replace(Z, ee), t) || [])[0])) return n;
          p && (t = t.parentNode), e = e.slice(u.shift().value.length);
        }

        o = V.needsContext.test(e) ? 0 : u.length;

        while (o--) {
          if (l = u[o], r.relative[c = l.type]) break;

          if ((f = r.find[c]) && (i = f(l.matches[0].replace(Z, ee), K.test(u[0].type) && ge(t.parentNode) || t))) {
            if (u.splice(o, 1), !(e = i.length && ve(u))) return L.apply(n, i), n;
            break;
          }
        }
      }

      return (p || s(e, d))(i, t, !g, n, !t || K.test(e) && ge(t.parentNode) || t), n;
    }, n.sortStable = b.split("").sort(D).join("") === b, n.detectDuplicates = !!f, p(), n.sortDetached = ue(function (e) {
      return 1 & e.compareDocumentPosition(d.createElement("fieldset"));
    }), ue(function (e) {
      return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href");
    }) || le("type|href|height|width", function (e, t, n) {
      if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2);
    }), n.attributes && ue(function (e) {
      return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value");
    }) || le("value", function (e, t, n) {
      if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue;
    }), ue(function (e) {
      return null == e.getAttribute("disabled");
    }) || le(P, function (e, t, n) {
      var r;
      if (!n) return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null;
    }), oe;
  }(e);

  w.find = E, w.expr = E.selectors, w.expr[":"] = w.expr.pseudos, w.uniqueSort = w.unique = E.uniqueSort, w.text = E.getText, w.isXMLDoc = E.isXML, w.contains = E.contains, w.escapeSelector = E.escape;

  var k = function k(e, t, n) {
    var r = [],
        i = void 0 !== n;

    while ((e = e[t]) && 9 !== e.nodeType) {
      if (1 === e.nodeType) {
        if (i && w(e).is(n)) break;
        r.push(e);
      }
    }

    return r;
  },
      S = function S(e, t) {
    for (var n = []; e; e = e.nextSibling) {
      1 === e.nodeType && e !== t && n.push(e);
    }

    return n;
  },
      D = w.expr.match.needsContext;

  function N(e, t) {
    return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
  }

  var A = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

  function j(e, t, n) {
    return g(t) ? w.grep(e, function (e, r) {
      return !!t.call(e, r, e) !== n;
    }) : t.nodeType ? w.grep(e, function (e) {
      return e === t !== n;
    }) : "string" != typeof t ? w.grep(e, function (e) {
      return u.call(t, e) > -1 !== n;
    }) : w.filter(t, e, n);
  }

  w.filter = function (e, t, n) {
    var r = t[0];
    return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? w.find.matchesSelector(r, e) ? [r] : [] : w.find.matches(e, w.grep(t, function (e) {
      return 1 === e.nodeType;
    }));
  }, w.fn.extend({
    find: function find(e) {
      var t,
          n,
          r = this.length,
          i = this;
      if ("string" != typeof e) return this.pushStack(w(e).filter(function () {
        for (t = 0; t < r; t++) {
          if (w.contains(i[t], this)) return !0;
        }
      }));

      for (n = this.pushStack([]), t = 0; t < r; t++) {
        w.find(e, i[t], n);
      }

      return r > 1 ? w.uniqueSort(n) : n;
    },
    filter: function filter(e) {
      return this.pushStack(j(this, e || [], !1));
    },
    not: function not(e) {
      return this.pushStack(j(this, e || [], !0));
    },
    is: function is(e) {
      return !!j(this, "string" == typeof e && D.test(e) ? w(e) : e || [], !1).length;
    }
  });
  var q,
      L = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
  (w.fn.init = function (e, t, n) {
    var i, o;
    if (!e) return this;

    if (n = n || q, "string" == typeof e) {
      if (!(i = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : L.exec(e)) || !i[1] && t) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);

      if (i[1]) {
        if (t = t instanceof w ? t[0] : t, w.merge(this, w.parseHTML(i[1], t && t.nodeType ? t.ownerDocument || t : r, !0)), A.test(i[1]) && w.isPlainObject(t)) for (i in t) {
          g(this[i]) ? this[i](t[i]) : this.attr(i, t[i]);
        }
        return this;
      }

      return (o = r.getElementById(i[2])) && (this[0] = o, this.length = 1), this;
    }

    return e.nodeType ? (this[0] = e, this.length = 1, this) : g(e) ? void 0 !== n.ready ? n.ready(e) : e(w) : w.makeArray(e, this);
  }).prototype = w.fn, q = w(r);
  var H = /^(?:parents|prev(?:Until|All))/,
      O = {
    children: !0,
    contents: !0,
    next: !0,
    prev: !0
  };
  w.fn.extend({
    has: function has(e) {
      var t = w(e, this),
          n = t.length;
      return this.filter(function () {
        for (var e = 0; e < n; e++) {
          if (w.contains(this, t[e])) return !0;
        }
      });
    },
    closest: function closest(e, t) {
      var n,
          r = 0,
          i = this.length,
          o = [],
          a = "string" != typeof e && w(e);
      if (!D.test(e)) for (; r < i; r++) {
        for (n = this[r]; n && n !== t; n = n.parentNode) {
          if (n.nodeType < 11 && (a ? a.index(n) > -1 : 1 === n.nodeType && w.find.matchesSelector(n, e))) {
            o.push(n);
            break;
          }
        }
      }
      return this.pushStack(o.length > 1 ? w.uniqueSort(o) : o);
    },
    index: function index(e) {
      return e ? "string" == typeof e ? u.call(w(e), this[0]) : u.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
    },
    add: function add(e, t) {
      return this.pushStack(w.uniqueSort(w.merge(this.get(), w(e, t))));
    },
    addBack: function addBack(e) {
      return this.add(null == e ? this.prevObject : this.prevObject.filter(e));
    }
  });

  function P(e, t) {
    while ((e = e[t]) && 1 !== e.nodeType) {
      ;
    }

    return e;
  }

  w.each({
    parent: function parent(e) {
      var t = e.parentNode;
      return t && 11 !== t.nodeType ? t : null;
    },
    parents: function parents(e) {
      return k(e, "parentNode");
    },
    parentsUntil: function parentsUntil(e, t, n) {
      return k(e, "parentNode", n);
    },
    next: function next(e) {
      return P(e, "nextSibling");
    },
    prev: function prev(e) {
      return P(e, "previousSibling");
    },
    nextAll: function nextAll(e) {
      return k(e, "nextSibling");
    },
    prevAll: function prevAll(e) {
      return k(e, "previousSibling");
    },
    nextUntil: function nextUntil(e, t, n) {
      return k(e, "nextSibling", n);
    },
    prevUntil: function prevUntil(e, t, n) {
      return k(e, "previousSibling", n);
    },
    siblings: function siblings(e) {
      return S((e.parentNode || {}).firstChild, e);
    },
    children: function children(e) {
      return S(e.firstChild);
    },
    contents: function contents(e) {
      return N(e, "iframe") ? e.contentDocument : (N(e, "template") && (e = e.content || e), w.merge([], e.childNodes));
    }
  }, function (e, t) {
    w.fn[e] = function (n, r) {
      var i = w.map(this, t, n);
      return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = w.filter(r, i)), this.length > 1 && (O[e] || w.uniqueSort(i), H.test(e) && i.reverse()), this.pushStack(i);
    };
  });
  var M = /[^\x20\t\r\n\f]+/g;

  function R(e) {
    var t = {};
    return w.each(e.match(M) || [], function (e, n) {
      t[n] = !0;
    }), t;
  }

  w.Callbacks = function (e) {
    e = "string" == typeof e ? R(e) : w.extend({}, e);

    var t,
        n,
        r,
        i,
        o = [],
        a = [],
        s = -1,
        u = function u() {
      for (i = i || e.once, r = t = !0; a.length; s = -1) {
        n = a.shift();

        while (++s < o.length) {
          !1 === o[s].apply(n[0], n[1]) && e.stopOnFalse && (s = o.length, n = !1);
        }
      }

      e.memory || (n = !1), t = !1, i && (o = n ? [] : "");
    },
        l = {
      add: function add() {
        return o && (n && !t && (s = o.length - 1, a.push(n)), function t(n) {
          w.each(n, function (n, r) {
            g(r) ? e.unique && l.has(r) || o.push(r) : r && r.length && "string" !== x(r) && t(r);
          });
        }(arguments), n && !t && u()), this;
      },
      remove: function remove() {
        return w.each(arguments, function (e, t) {
          var n;

          while ((n = w.inArray(t, o, n)) > -1) {
            o.splice(n, 1), n <= s && s--;
          }
        }), this;
      },
      has: function has(e) {
        return e ? w.inArray(e, o) > -1 : o.length > 0;
      },
      empty: function empty() {
        return o && (o = []), this;
      },
      disable: function disable() {
        return i = a = [], o = n = "", this;
      },
      disabled: function disabled() {
        return !o;
      },
      lock: function lock() {
        return i = a = [], n || t || (o = n = ""), this;
      },
      locked: function locked() {
        return !!i;
      },
      fireWith: function fireWith(e, n) {
        return i || (n = [e, (n = n || []).slice ? n.slice() : n], a.push(n), t || u()), this;
      },
      fire: function fire() {
        return l.fireWith(this, arguments), this;
      },
      fired: function fired() {
        return !!r;
      }
    };

    return l;
  };

  function I(e) {
    return e;
  }

  function W(e) {
    throw e;
  }

  function $(e, t, n, r) {
    var i;

    try {
      e && g(i = e.promise) ? i.call(e).done(t).fail(n) : e && g(i = e.then) ? i.call(e, t, n) : t.apply(void 0, [e].slice(r));
    } catch (e) {
      n.apply(void 0, [e]);
    }
  }

  w.extend({
    Deferred: function Deferred(t) {
      var n = [["notify", "progress", w.Callbacks("memory"), w.Callbacks("memory"), 2], ["resolve", "done", w.Callbacks("once memory"), w.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", w.Callbacks("once memory"), w.Callbacks("once memory"), 1, "rejected"]],
          r = "pending",
          i = {
        state: function state() {
          return r;
        },
        always: function always() {
          return o.done(arguments).fail(arguments), this;
        },
        "catch": function _catch(e) {
          return i.then(null, e);
        },
        pipe: function pipe() {
          var e = arguments;
          return w.Deferred(function (t) {
            w.each(n, function (n, r) {
              var i = g(e[r[4]]) && e[r[4]];
              o[r[1]](function () {
                var e = i && i.apply(this, arguments);
                e && g(e.promise) ? e.promise().progress(t.notify).done(t.resolve).fail(t.reject) : t[r[0] + "With"](this, i ? [e] : arguments);
              });
            }), e = null;
          }).promise();
        },
        then: function then(t, r, i) {
          var o = 0;

          function a(t, n, r, i) {
            return function () {
              var s = this,
                  u = arguments,
                  l = function l() {
                var e, l;

                if (!(t < o)) {
                  if ((e = r.apply(s, u)) === n.promise()) throw new TypeError("Thenable self-resolution");
                  l = e && ("object" == _typeof(e) || "function" == typeof e) && e.then, g(l) ? i ? l.call(e, a(o, n, I, i), a(o, n, W, i)) : (o++, l.call(e, a(o, n, I, i), a(o, n, W, i), a(o, n, I, n.notifyWith))) : (r !== I && (s = void 0, u = [e]), (i || n.resolveWith)(s, u));
                }
              },
                  c = i ? l : function () {
                try {
                  l();
                } catch (e) {
                  w.Deferred.exceptionHook && w.Deferred.exceptionHook(e, c.stackTrace), t + 1 >= o && (r !== W && (s = void 0, u = [e]), n.rejectWith(s, u));
                }
              };

              t ? c() : (w.Deferred.getStackHook && (c.stackTrace = w.Deferred.getStackHook()), e.setTimeout(c));
            };
          }

          return w.Deferred(function (e) {
            n[0][3].add(a(0, e, g(i) ? i : I, e.notifyWith)), n[1][3].add(a(0, e, g(t) ? t : I)), n[2][3].add(a(0, e, g(r) ? r : W));
          }).promise();
        },
        promise: function promise(e) {
          return null != e ? w.extend(e, i) : i;
        }
      },
          o = {};
      return w.each(n, function (e, t) {
        var a = t[2],
            s = t[5];
        i[t[1]] = a.add, s && a.add(function () {
          r = s;
        }, n[3 - e][2].disable, n[3 - e][3].disable, n[0][2].lock, n[0][3].lock), a.add(t[3].fire), o[t[0]] = function () {
          return o[t[0] + "With"](this === o ? void 0 : this, arguments), this;
        }, o[t[0] + "With"] = a.fireWith;
      }), i.promise(o), t && t.call(o, o), o;
    },
    when: function when(e) {
      var t = arguments.length,
          n = t,
          r = Array(n),
          i = o.call(arguments),
          a = w.Deferred(),
          s = function s(e) {
        return function (n) {
          r[e] = this, i[e] = arguments.length > 1 ? o.call(arguments) : n, --t || a.resolveWith(r, i);
        };
      };

      if (t <= 1 && ($(e, a.done(s(n)).resolve, a.reject, !t), "pending" === a.state() || g(i[n] && i[n].then))) return a.then();

      while (n--) {
        $(i[n], s(n), a.reject);
      }

      return a.promise();
    }
  });
  var B = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
  w.Deferred.exceptionHook = function (t, n) {
    e.console && e.console.warn && t && B.test(t.name) && e.console.warn("jQuery.Deferred exception: " + t.message, t.stack, n);
  }, w.readyException = function (t) {
    e.setTimeout(function () {
      throw t;
    });
  };
  var F = w.Deferred();
  w.fn.ready = function (e) {
    return F.then(e)["catch"](function (e) {
      w.readyException(e);
    }), this;
  }, w.extend({
    isReady: !1,
    readyWait: 1,
    ready: function ready(e) {
      (!0 === e ? --w.readyWait : w.isReady) || (w.isReady = !0, !0 !== e && --w.readyWait > 0 || F.resolveWith(r, [w]));
    }
  }), w.ready.then = F.then;

  function _() {
    r.removeEventListener("DOMContentLoaded", _), e.removeEventListener("load", _), w.ready();
  }

  "complete" === r.readyState || "loading" !== r.readyState && !r.documentElement.doScroll ? e.setTimeout(w.ready) : (r.addEventListener("DOMContentLoaded", _), e.addEventListener("load", _));

  var z = function z(e, t, n, r, i, o, a) {
    var s = 0,
        u = e.length,
        l = null == n;

    if ("object" === x(n)) {
      i = !0;

      for (s in n) {
        z(e, t, s, n[s], !0, o, a);
      }
    } else if (void 0 !== r && (i = !0, g(r) || (a = !0), l && (a ? (t.call(e, r), t = null) : (l = t, t = function t(e, _t2, n) {
      return l.call(w(e), n);
    })), t)) for (; s < u; s++) {
      t(e[s], n, a ? r : r.call(e[s], s, t(e[s], n)));
    }

    return i ? e : l ? t.call(e) : u ? t(e[0], n) : o;
  },
      X = /^-ms-/,
      U = /-([a-z])/g;

  function V(e, t) {
    return t.toUpperCase();
  }

  function G(e) {
    return e.replace(X, "ms-").replace(U, V);
  }

  var Y = function Y(e) {
    return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType;
  };

  function Q() {
    this.expando = w.expando + Q.uid++;
  }

  Q.uid = 1, Q.prototype = {
    cache: function cache(e) {
      var t = e[this.expando];
      return t || (t = {}, Y(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
        value: t,
        configurable: !0
      }))), t;
    },
    set: function set(e, t, n) {
      var r,
          i = this.cache(e);
      if ("string" == typeof t) i[G(t)] = n;else for (r in t) {
        i[G(r)] = t[r];
      }
      return i;
    },
    get: function get(e, t) {
      return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][G(t)];
    },
    access: function access(e, t, n) {
      return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t);
    },
    remove: function remove(e, t) {
      var n,
          r = e[this.expando];

      if (void 0 !== r) {
        if (void 0 !== t) {
          n = (t = Array.isArray(t) ? t.map(G) : (t = G(t)) in r ? [t] : t.match(M) || []).length;

          while (n--) {
            delete r[t[n]];
          }
        }

        (void 0 === t || w.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando]);
      }
    },
    hasData: function hasData(e) {
      var t = e[this.expando];
      return void 0 !== t && !w.isEmptyObject(t);
    }
  };
  var J = new Q(),
      K = new Q(),
      Z = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
      ee = /[A-Z]/g;

  function te(e) {
    return "true" === e || "false" !== e && ("null" === e ? null : e === +e + "" ? +e : Z.test(e) ? JSON.parse(e) : e);
  }

  function ne(e, t, n) {
    var r;
    if (void 0 === n && 1 === e.nodeType) if (r = "data-" + t.replace(ee, "-$&").toLowerCase(), "string" == typeof (n = e.getAttribute(r))) {
      try {
        n = te(n);
      } catch (e) {}

      K.set(e, t, n);
    } else n = void 0;
    return n;
  }

  w.extend({
    hasData: function hasData(e) {
      return K.hasData(e) || J.hasData(e);
    },
    data: function data(e, t, n) {
      return K.access(e, t, n);
    },
    removeData: function removeData(e, t) {
      K.remove(e, t);
    },
    _data: function _data(e, t, n) {
      return J.access(e, t, n);
    },
    _removeData: function _removeData(e, t) {
      J.remove(e, t);
    }
  }), w.fn.extend({
    data: function data(e, t) {
      var n,
          r,
          i,
          o = this[0],
          a = o && o.attributes;

      if (void 0 === e) {
        if (this.length && (i = K.get(o), 1 === o.nodeType && !J.get(o, "hasDataAttrs"))) {
          n = a.length;

          while (n--) {
            a[n] && 0 === (r = a[n].name).indexOf("data-") && (r = G(r.slice(5)), ne(o, r, i[r]));
          }

          J.set(o, "hasDataAttrs", !0);
        }

        return i;
      }

      return "object" == _typeof(e) ? this.each(function () {
        K.set(this, e);
      }) : z(this, function (t) {
        var n;

        if (o && void 0 === t) {
          if (void 0 !== (n = K.get(o, e))) return n;
          if (void 0 !== (n = ne(o, e))) return n;
        } else this.each(function () {
          K.set(this, e, t);
        });
      }, null, t, arguments.length > 1, null, !0);
    },
    removeData: function removeData(e) {
      return this.each(function () {
        K.remove(this, e);
      });
    }
  }), w.extend({
    queue: function queue(e, t, n) {
      var r;
      if (e) return t = (t || "fx") + "queue", r = J.get(e, t), n && (!r || Array.isArray(n) ? r = J.access(e, t, w.makeArray(n)) : r.push(n)), r || [];
    },
    dequeue: function dequeue(e, t) {
      t = t || "fx";

      var n = w.queue(e, t),
          r = n.length,
          i = n.shift(),
          o = w._queueHooks(e, t),
          a = function a() {
        w.dequeue(e, t);
      };

      "inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, a, o)), !r && o && o.empty.fire();
    },
    _queueHooks: function _queueHooks(e, t) {
      var n = t + "queueHooks";
      return J.get(e, n) || J.access(e, n, {
        empty: w.Callbacks("once memory").add(function () {
          J.remove(e, [t + "queue", n]);
        })
      });
    }
  }), w.fn.extend({
    queue: function queue(e, t) {
      var n = 2;
      return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? w.queue(this[0], e) : void 0 === t ? this : this.each(function () {
        var n = w.queue(this, e, t);
        w._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && w.dequeue(this, e);
      });
    },
    dequeue: function dequeue(e) {
      return this.each(function () {
        w.dequeue(this, e);
      });
    },
    clearQueue: function clearQueue(e) {
      return this.queue(e || "fx", []);
    },
    promise: function promise(e, t) {
      var n,
          r = 1,
          i = w.Deferred(),
          o = this,
          a = this.length,
          s = function s() {
        --r || i.resolveWith(o, [o]);
      };

      "string" != typeof e && (t = e, e = void 0), e = e || "fx";

      while (a--) {
        (n = J.get(o[a], e + "queueHooks")) && n.empty && (r++, n.empty.add(s));
      }

      return s(), i.promise(t);
    }
  });

  var re = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
      ie = new RegExp("^(?:([+-])=|)(" + re + ")([a-z%]*)$", "i"),
      oe = ["Top", "Right", "Bottom", "Left"],
      ae = function ae(e, t) {
    return "none" === (e = t || e).style.display || "" === e.style.display && w.contains(e.ownerDocument, e) && "none" === w.css(e, "display");
  },
      se = function se(e, t, n, r) {
    var i,
        o,
        a = {};

    for (o in t) {
      a[o] = e.style[o], e.style[o] = t[o];
    }

    i = n.apply(e, r || []);

    for (o in t) {
      e.style[o] = a[o];
    }

    return i;
  };

  function ue(e, t, n, r) {
    var i,
        o,
        a = 20,
        s = r ? function () {
      return r.cur();
    } : function () {
      return w.css(e, t, "");
    },
        u = s(),
        l = n && n[3] || (w.cssNumber[t] ? "" : "px"),
        c = (w.cssNumber[t] || "px" !== l && +u) && ie.exec(w.css(e, t));

    if (c && c[3] !== l) {
      u /= 2, l = l || c[3], c = +u || 1;

      while (a--) {
        w.style(e, t, c + l), (1 - o) * (1 - (o = s() / u || .5)) <= 0 && (a = 0), c /= o;
      }

      c *= 2, w.style(e, t, c + l), n = n || [];
    }

    return n && (c = +c || +u || 0, i = n[1] ? c + (n[1] + 1) * n[2] : +n[2], r && (r.unit = l, r.start = c, r.end = i)), i;
  }

  var le = {};

  function ce(e) {
    var t,
        n = e.ownerDocument,
        r = e.nodeName,
        i = le[r];
    return i || (t = n.body.appendChild(n.createElement(r)), i = w.css(t, "display"), t.parentNode.removeChild(t), "none" === i && (i = "block"), le[r] = i, i);
  }

  function fe(e, t) {
    for (var n, r, i = [], o = 0, a = e.length; o < a; o++) {
      (r = e[o]).style && (n = r.style.display, t ? ("none" === n && (i[o] = J.get(r, "display") || null, i[o] || (r.style.display = "")), "" === r.style.display && ae(r) && (i[o] = ce(r))) : "none" !== n && (i[o] = "none", J.set(r, "display", n)));
    }

    for (o = 0; o < a; o++) {
      null != i[o] && (e[o].style.display = i[o]);
    }

    return e;
  }

  w.fn.extend({
    show: function show() {
      return fe(this, !0);
    },
    hide: function hide() {
      return fe(this);
    },
    toggle: function toggle(e) {
      return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function () {
        ae(this) ? w(this).show() : w(this).hide();
      });
    }
  });
  var pe = /^(?:checkbox|radio)$/i,
      de = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
      he = /^$|^module$|\/(?:java|ecma)script/i,
      ge = {
    option: [1, "<select multiple='multiple'>", "</select>"],
    thead: [1, "<table>", "</table>"],
    col: [2, "<table><colgroup>", "</colgroup></table>"],
    tr: [2, "<table><tbody>", "</tbody></table>"],
    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
    _default: [0, "", ""]
  };
  ge.optgroup = ge.option, ge.tbody = ge.tfoot = ge.colgroup = ge.caption = ge.thead, ge.th = ge.td;

  function ye(e, t) {
    var n;
    return n = "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName(t || "*") : "undefined" != typeof e.querySelectorAll ? e.querySelectorAll(t || "*") : [], void 0 === t || t && N(e, t) ? w.merge([e], n) : n;
  }

  function ve(e, t) {
    for (var n = 0, r = e.length; n < r; n++) {
      J.set(e[n], "globalEval", !t || J.get(t[n], "globalEval"));
    }
  }

  var me = /<|&#?\w+;/;

  function xe(e, t, n, r, i) {
    for (var o, a, s, u, l, c, f = t.createDocumentFragment(), p = [], d = 0, h = e.length; d < h; d++) {
      if ((o = e[d]) || 0 === o) if ("object" === x(o)) w.merge(p, o.nodeType ? [o] : o);else if (me.test(o)) {
        a = a || f.appendChild(t.createElement("div")), s = (de.exec(o) || ["", ""])[1].toLowerCase(), u = ge[s] || ge._default, a.innerHTML = u[1] + w.htmlPrefilter(o) + u[2], c = u[0];

        while (c--) {
          a = a.lastChild;
        }

        w.merge(p, a.childNodes), (a = f.firstChild).textContent = "";
      } else p.push(t.createTextNode(o));
    }

    f.textContent = "", d = 0;

    while (o = p[d++]) {
      if (r && w.inArray(o, r) > -1) i && i.push(o);else if (l = w.contains(o.ownerDocument, o), a = ye(f.appendChild(o), "script"), l && ve(a), n) {
        c = 0;

        while (o = a[c++]) {
          he.test(o.type || "") && n.push(o);
        }
      }
    }

    return f;
  }

  !function () {
    var e = r.createDocumentFragment().appendChild(r.createElement("div")),
        t = r.createElement("input");
    t.setAttribute("type", "radio"), t.setAttribute("checked", "checked"), t.setAttribute("name", "t"), e.appendChild(t), h.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked, e.innerHTML = "<textarea>x</textarea>", h.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue;
  }();
  var be = r.documentElement,
      we = /^key/,
      Te = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
      Ce = /^([^.]*)(?:\.(.+)|)/;

  function Ee() {
    return !0;
  }

  function ke() {
    return !1;
  }

  function Se() {
    try {
      return r.activeElement;
    } catch (e) {}
  }

  function De(e, t, n, r, i, o) {
    var a, s;

    if ("object" == _typeof(t)) {
      "string" != typeof n && (r = r || n, n = void 0);

      for (s in t) {
        De(e, s, n, r, t[s], o);
      }

      return e;
    }

    if (null == r && null == i ? (i = n, r = n = void 0) : null == i && ("string" == typeof n ? (i = r, r = void 0) : (i = r, r = n, n = void 0)), !1 === i) i = ke;else if (!i) return e;
    return 1 === o && (a = i, (i = function i(e) {
      return w().off(e), a.apply(this, arguments);
    }).guid = a.guid || (a.guid = w.guid++)), e.each(function () {
      w.event.add(this, t, i, r, n);
    });
  }

  w.event = {
    global: {},
    add: function add(e, t, n, r, i) {
      var o,
          a,
          s,
          u,
          l,
          c,
          f,
          p,
          d,
          h,
          g,
          y = J.get(e);

      if (y) {
        n.handler && (n = (o = n).handler, i = o.selector), i && w.find.matchesSelector(be, i), n.guid || (n.guid = w.guid++), (u = y.events) || (u = y.events = {}), (a = y.handle) || (a = y.handle = function (t) {
          return "undefined" != typeof w && w.event.triggered !== t.type ? w.event.dispatch.apply(e, arguments) : void 0;
        }), l = (t = (t || "").match(M) || [""]).length;

        while (l--) {
          d = g = (s = Ce.exec(t[l]) || [])[1], h = (s[2] || "").split(".").sort(), d && (f = w.event.special[d] || {}, d = (i ? f.delegateType : f.bindType) || d, f = w.event.special[d] || {}, c = w.extend({
            type: d,
            origType: g,
            data: r,
            handler: n,
            guid: n.guid,
            selector: i,
            needsContext: i && w.expr.match.needsContext.test(i),
            namespace: h.join(".")
          }, o), (p = u[d]) || ((p = u[d] = []).delegateCount = 0, f.setup && !1 !== f.setup.call(e, r, h, a) || e.addEventListener && e.addEventListener(d, a)), f.add && (f.add.call(e, c), c.handler.guid || (c.handler.guid = n.guid)), i ? p.splice(p.delegateCount++, 0, c) : p.push(c), w.event.global[d] = !0);
        }
      }
    },
    remove: function remove(e, t, n, r, i) {
      var o,
          a,
          s,
          u,
          l,
          c,
          f,
          p,
          d,
          h,
          g,
          y = J.hasData(e) && J.get(e);

      if (y && (u = y.events)) {
        l = (t = (t || "").match(M) || [""]).length;

        while (l--) {
          if (s = Ce.exec(t[l]) || [], d = g = s[1], h = (s[2] || "").split(".").sort(), d) {
            f = w.event.special[d] || {}, p = u[d = (r ? f.delegateType : f.bindType) || d] || [], s = s[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), a = o = p.length;

            while (o--) {
              c = p[o], !i && g !== c.origType || n && n.guid !== c.guid || s && !s.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (p.splice(o, 1), c.selector && p.delegateCount--, f.remove && f.remove.call(e, c));
            }

            a && !p.length && (f.teardown && !1 !== f.teardown.call(e, h, y.handle) || w.removeEvent(e, d, y.handle), delete u[d]);
          } else for (d in u) {
            w.event.remove(e, d + t[l], n, r, !0);
          }
        }

        w.isEmptyObject(u) && J.remove(e, "handle events");
      }
    },
    dispatch: function dispatch(e) {
      var t = w.event.fix(e),
          n,
          r,
          i,
          o,
          a,
          s,
          u = new Array(arguments.length),
          l = (J.get(this, "events") || {})[t.type] || [],
          c = w.event.special[t.type] || {};

      for (u[0] = t, n = 1; n < arguments.length; n++) {
        u[n] = arguments[n];
      }

      if (t.delegateTarget = this, !c.preDispatch || !1 !== c.preDispatch.call(this, t)) {
        s = w.event.handlers.call(this, t, l), n = 0;

        while ((o = s[n++]) && !t.isPropagationStopped()) {
          t.currentTarget = o.elem, r = 0;

          while ((a = o.handlers[r++]) && !t.isImmediatePropagationStopped()) {
            t.rnamespace && !t.rnamespace.test(a.namespace) || (t.handleObj = a, t.data = a.data, void 0 !== (i = ((w.event.special[a.origType] || {}).handle || a.handler).apply(o.elem, u)) && !1 === (t.result = i) && (t.preventDefault(), t.stopPropagation()));
          }
        }

        return c.postDispatch && c.postDispatch.call(this, t), t.result;
      }
    },
    handlers: function handlers(e, t) {
      var n,
          r,
          i,
          o,
          a,
          s = [],
          u = t.delegateCount,
          l = e.target;
      if (u && l.nodeType && !("click" === e.type && e.button >= 1)) for (; l !== this; l = l.parentNode || this) {
        if (1 === l.nodeType && ("click" !== e.type || !0 !== l.disabled)) {
          for (o = [], a = {}, n = 0; n < u; n++) {
            void 0 === a[i = (r = t[n]).selector + " "] && (a[i] = r.needsContext ? w(i, this).index(l) > -1 : w.find(i, this, null, [l]).length), a[i] && o.push(r);
          }

          o.length && s.push({
            elem: l,
            handlers: o
          });
        }
      }
      return l = this, u < t.length && s.push({
        elem: l,
        handlers: t.slice(u)
      }), s;
    },
    addProp: function addProp(e, t) {
      Object.defineProperty(w.Event.prototype, e, {
        enumerable: !0,
        configurable: !0,
        get: g(t) ? function () {
          if (this.originalEvent) return t(this.originalEvent);
        } : function () {
          if (this.originalEvent) return this.originalEvent[e];
        },
        set: function set(t) {
          Object.defineProperty(this, e, {
            enumerable: !0,
            configurable: !0,
            writable: !0,
            value: t
          });
        }
      });
    },
    fix: function fix(e) {
      return e[w.expando] ? e : new w.Event(e);
    },
    special: {
      load: {
        noBubble: !0
      },
      focus: {
        trigger: function trigger() {
          if (this !== Se() && this.focus) return this.focus(), !1;
        },
        delegateType: "focusin"
      },
      blur: {
        trigger: function trigger() {
          if (this === Se() && this.blur) return this.blur(), !1;
        },
        delegateType: "focusout"
      },
      click: {
        trigger: function trigger() {
          if ("checkbox" === this.type && this.click && N(this, "input")) return this.click(), !1;
        },
        _default: function _default(e) {
          return N(e.target, "a");
        }
      },
      beforeunload: {
        postDispatch: function postDispatch(e) {
          void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result);
        }
      }
    }
  }, w.removeEvent = function (e, t, n) {
    e.removeEventListener && e.removeEventListener(t, n);
  }, w.Event = function (e, t) {
    if (!(this instanceof w.Event)) return new w.Event(e, t);
    e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? Ee : ke, this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target, this.currentTarget = e.currentTarget, this.relatedTarget = e.relatedTarget) : this.type = e, t && w.extend(this, t), this.timeStamp = e && e.timeStamp || Date.now(), this[w.expando] = !0;
  }, w.Event.prototype = {
    constructor: w.Event,
    isDefaultPrevented: ke,
    isPropagationStopped: ke,
    isImmediatePropagationStopped: ke,
    isSimulated: !1,
    preventDefault: function preventDefault() {
      var e = this.originalEvent;
      this.isDefaultPrevented = Ee, e && !this.isSimulated && e.preventDefault();
    },
    stopPropagation: function stopPropagation() {
      var e = this.originalEvent;
      this.isPropagationStopped = Ee, e && !this.isSimulated && e.stopPropagation();
    },
    stopImmediatePropagation: function stopImmediatePropagation() {
      var e = this.originalEvent;
      this.isImmediatePropagationStopped = Ee, e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation();
    }
  }, w.each({
    altKey: !0,
    bubbles: !0,
    cancelable: !0,
    changedTouches: !0,
    ctrlKey: !0,
    detail: !0,
    eventPhase: !0,
    metaKey: !0,
    pageX: !0,
    pageY: !0,
    shiftKey: !0,
    view: !0,
    "char": !0,
    charCode: !0,
    key: !0,
    keyCode: !0,
    button: !0,
    buttons: !0,
    clientX: !0,
    clientY: !0,
    offsetX: !0,
    offsetY: !0,
    pointerId: !0,
    pointerType: !0,
    screenX: !0,
    screenY: !0,
    targetTouches: !0,
    toElement: !0,
    touches: !0,
    which: function which(e) {
      var t = e.button;
      return null == e.which && we.test(e.type) ? null != e.charCode ? e.charCode : e.keyCode : !e.which && void 0 !== t && Te.test(e.type) ? 1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0 : e.which;
    }
  }, w.event.addProp), w.each({
    mouseenter: "mouseover",
    mouseleave: "mouseout",
    pointerenter: "pointerover",
    pointerleave: "pointerout"
  }, function (e, t) {
    w.event.special[e] = {
      delegateType: t,
      bindType: t,
      handle: function handle(e) {
        var n,
            r = this,
            i = e.relatedTarget,
            o = e.handleObj;
        return i && (i === r || w.contains(r, i)) || (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n;
      }
    };
  }), w.fn.extend({
    on: function on(e, t, n, r) {
      return De(this, e, t, n, r);
    },
    one: function one(e, t, n, r) {
      return De(this, e, t, n, r, 1);
    },
    off: function off(e, t, n) {
      var r, i;
      if (e && e.preventDefault && e.handleObj) return r = e.handleObj, w(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;

      if ("object" == _typeof(e)) {
        for (i in e) {
          this.off(i, t, e[i]);
        }

        return this;
      }

      return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = ke), this.each(function () {
        w.event.remove(this, e, n, t);
      });
    }
  });
  var Ne = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
      Ae = /<script|<style|<link/i,
      je = /checked\s*(?:[^=]|=\s*.checked.)/i,
      qe = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

  function Le(e, t) {
    return N(e, "table") && N(11 !== t.nodeType ? t : t.firstChild, "tr") ? w(e).children("tbody")[0] || e : e;
  }

  function He(e) {
    return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e;
  }

  function Oe(e) {
    return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"), e;
  }

  function Pe(e, t) {
    var n, r, i, o, a, s, u, l;

    if (1 === t.nodeType) {
      if (J.hasData(e) && (o = J.access(e), a = J.set(t, o), l = o.events)) {
        delete a.handle, a.events = {};

        for (i in l) {
          for (n = 0, r = l[i].length; n < r; n++) {
            w.event.add(t, i, l[i][n]);
          }
        }
      }

      K.hasData(e) && (s = K.access(e), u = w.extend({}, s), K.set(t, u));
    }
  }

  function Me(e, t) {
    var n = t.nodeName.toLowerCase();
    "input" === n && pe.test(e.type) ? t.checked = e.checked : "input" !== n && "textarea" !== n || (t.defaultValue = e.defaultValue);
  }

  function Re(e, t, n, r) {
    t = a.apply([], t);
    var i,
        o,
        s,
        u,
        l,
        c,
        f = 0,
        p = e.length,
        d = p - 1,
        y = t[0],
        v = g(y);
    if (v || p > 1 && "string" == typeof y && !h.checkClone && je.test(y)) return e.each(function (i) {
      var o = e.eq(i);
      v && (t[0] = y.call(this, i, o.html())), Re(o, t, n, r);
    });

    if (p && (i = xe(t, e[0].ownerDocument, !1, e, r), o = i.firstChild, 1 === i.childNodes.length && (i = o), o || r)) {
      for (u = (s = w.map(ye(i, "script"), He)).length; f < p; f++) {
        l = i, f !== d && (l = w.clone(l, !0, !0), u && w.merge(s, ye(l, "script"))), n.call(e[f], l, f);
      }

      if (u) for (c = s[s.length - 1].ownerDocument, w.map(s, Oe), f = 0; f < u; f++) {
        l = s[f], he.test(l.type || "") && !J.access(l, "globalEval") && w.contains(c, l) && (l.src && "module" !== (l.type || "").toLowerCase() ? w._evalUrl && w._evalUrl(l.src) : m(l.textContent.replace(qe, ""), c, l));
      }
    }

    return e;
  }

  function Ie(e, t, n) {
    for (var r, i = t ? w.filter(t, e) : e, o = 0; null != (r = i[o]); o++) {
      n || 1 !== r.nodeType || w.cleanData(ye(r)), r.parentNode && (n && w.contains(r.ownerDocument, r) && ve(ye(r, "script")), r.parentNode.removeChild(r));
    }

    return e;
  }

  w.extend({
    htmlPrefilter: function htmlPrefilter(e) {
      return e.replace(Ne, "<$1></$2>");
    },
    clone: function clone(e, t, n) {
      var r,
          i,
          o,
          a,
          s = e.cloneNode(!0),
          u = w.contains(e.ownerDocument, e);
      if (!(h.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || w.isXMLDoc(e))) for (a = ye(s), r = 0, i = (o = ye(e)).length; r < i; r++) {
        Me(o[r], a[r]);
      }
      if (t) if (n) for (o = o || ye(e), a = a || ye(s), r = 0, i = o.length; r < i; r++) {
        Pe(o[r], a[r]);
      } else Pe(e, s);
      return (a = ye(s, "script")).length > 0 && ve(a, !u && ye(e, "script")), s;
    },
    cleanData: function cleanData(e) {
      for (var t, n, r, i = w.event.special, o = 0; void 0 !== (n = e[o]); o++) {
        if (Y(n)) {
          if (t = n[J.expando]) {
            if (t.events) for (r in t.events) {
              i[r] ? w.event.remove(n, r) : w.removeEvent(n, r, t.handle);
            }
            n[J.expando] = void 0;
          }

          n[K.expando] && (n[K.expando] = void 0);
        }
      }
    }
  }), w.fn.extend({
    detach: function detach(e) {
      return Ie(this, e, !0);
    },
    remove: function remove(e) {
      return Ie(this, e);
    },
    text: function text(e) {
      return z(this, function (e) {
        return void 0 === e ? w.text(this) : this.empty().each(function () {
          1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e);
        });
      }, null, e, arguments.length);
    },
    append: function append() {
      return Re(this, arguments, function (e) {
        1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Le(this, e).appendChild(e);
      });
    },
    prepend: function prepend() {
      return Re(this, arguments, function (e) {
        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
          var t = Le(this, e);
          t.insertBefore(e, t.firstChild);
        }
      });
    },
    before: function before() {
      return Re(this, arguments, function (e) {
        this.parentNode && this.parentNode.insertBefore(e, this);
      });
    },
    after: function after() {
      return Re(this, arguments, function (e) {
        this.parentNode && this.parentNode.insertBefore(e, this.nextSibling);
      });
    },
    empty: function empty() {
      for (var e, t = 0; null != (e = this[t]); t++) {
        1 === e.nodeType && (w.cleanData(ye(e, !1)), e.textContent = "");
      }

      return this;
    },
    clone: function clone(e, t) {
      return e = null != e && e, t = null == t ? e : t, this.map(function () {
        return w.clone(this, e, t);
      });
    },
    html: function html(e) {
      return z(this, function (e) {
        var t = this[0] || {},
            n = 0,
            r = this.length;
        if (void 0 === e && 1 === t.nodeType) return t.innerHTML;

        if ("string" == typeof e && !Ae.test(e) && !ge[(de.exec(e) || ["", ""])[1].toLowerCase()]) {
          e = w.htmlPrefilter(e);

          try {
            for (; n < r; n++) {
              1 === (t = this[n] || {}).nodeType && (w.cleanData(ye(t, !1)), t.innerHTML = e);
            }

            t = 0;
          } catch (e) {}
        }

        t && this.empty().append(e);
      }, null, e, arguments.length);
    },
    replaceWith: function replaceWith() {
      var e = [];
      return Re(this, arguments, function (t) {
        var n = this.parentNode;
        w.inArray(this, e) < 0 && (w.cleanData(ye(this)), n && n.replaceChild(t, this));
      }, e);
    }
  }), w.each({
    appendTo: "append",
    prependTo: "prepend",
    insertBefore: "before",
    insertAfter: "after",
    replaceAll: "replaceWith"
  }, function (e, t) {
    w.fn[e] = function (e) {
      for (var n, r = [], i = w(e), o = i.length - 1, a = 0; a <= o; a++) {
        n = a === o ? this : this.clone(!0), w(i[a])[t](n), s.apply(r, n.get());
      }

      return this.pushStack(r);
    };
  });

  var We = new RegExp("^(" + re + ")(?!px)[a-z%]+$", "i"),
      $e = function $e(t) {
    var n = t.ownerDocument.defaultView;
    return n && n.opener || (n = e), n.getComputedStyle(t);
  },
      Be = new RegExp(oe.join("|"), "i");

  !function () {
    function t() {
      if (c) {
        l.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0", c.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%", be.appendChild(l).appendChild(c);
        var t = e.getComputedStyle(c);
        i = "1%" !== t.top, u = 12 === n(t.marginLeft), c.style.right = "60%", s = 36 === n(t.right), o = 36 === n(t.width), c.style.position = "absolute", a = 36 === c.offsetWidth || "absolute", be.removeChild(l), c = null;
      }
    }

    function n(e) {
      return Math.round(parseFloat(e));
    }

    var i,
        o,
        a,
        s,
        u,
        l = r.createElement("div"),
        c = r.createElement("div");
    c.style && (c.style.backgroundClip = "content-box", c.cloneNode(!0).style.backgroundClip = "", h.clearCloneStyle = "content-box" === c.style.backgroundClip, w.extend(h, {
      boxSizingReliable: function boxSizingReliable() {
        return t(), o;
      },
      pixelBoxStyles: function pixelBoxStyles() {
        return t(), s;
      },
      pixelPosition: function pixelPosition() {
        return t(), i;
      },
      reliableMarginLeft: function reliableMarginLeft() {
        return t(), u;
      },
      scrollboxSize: function scrollboxSize() {
        return t(), a;
      }
    }));
  }();

  function Fe(e, t, n) {
    var r,
        i,
        o,
        a,
        s = e.style;
    return (n = n || $e(e)) && ("" !== (a = n.getPropertyValue(t) || n[t]) || w.contains(e.ownerDocument, e) || (a = w.style(e, t)), !h.pixelBoxStyles() && We.test(a) && Be.test(t) && (r = s.width, i = s.minWidth, o = s.maxWidth, s.minWidth = s.maxWidth = s.width = a, a = n.width, s.width = r, s.minWidth = i, s.maxWidth = o)), void 0 !== a ? a + "" : a;
  }

  function _e(e, t) {
    return {
      get: function get() {
        if (!e()) return (this.get = t).apply(this, arguments);
        delete this.get;
      }
    };
  }

  var ze = /^(none|table(?!-c[ea]).+)/,
      Xe = /^--/,
      Ue = {
    position: "absolute",
    visibility: "hidden",
    display: "block"
  },
      Ve = {
    letterSpacing: "0",
    fontWeight: "400"
  },
      Ge = ["Webkit", "Moz", "ms"],
      Ye = r.createElement("div").style;

  function Qe(e) {
    if (e in Ye) return e;
    var t = e[0].toUpperCase() + e.slice(1),
        n = Ge.length;

    while (n--) {
      if ((e = Ge[n] + t) in Ye) return e;
    }
  }

  function Je(e) {
    var t = w.cssProps[e];
    return t || (t = w.cssProps[e] = Qe(e) || e), t;
  }

  function Ke(e, t, n) {
    var r = ie.exec(t);
    return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t;
  }

  function Ze(e, t, n, r, i, o) {
    var a = "width" === t ? 1 : 0,
        s = 0,
        u = 0;
    if (n === (r ? "border" : "content")) return 0;

    for (; a < 4; a += 2) {
      "margin" === n && (u += w.css(e, n + oe[a], !0, i)), r ? ("content" === n && (u -= w.css(e, "padding" + oe[a], !0, i)), "margin" !== n && (u -= w.css(e, "border" + oe[a] + "Width", !0, i))) : (u += w.css(e, "padding" + oe[a], !0, i), "padding" !== n ? u += w.css(e, "border" + oe[a] + "Width", !0, i) : s += w.css(e, "border" + oe[a] + "Width", !0, i));
    }

    return !r && o >= 0 && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - u - s - .5))), u;
  }

  function et(e, t, n) {
    var r = $e(e),
        i = Fe(e, t, r),
        o = "border-box" === w.css(e, "boxSizing", !1, r),
        a = o;

    if (We.test(i)) {
      if (!n) return i;
      i = "auto";
    }

    return a = a && (h.boxSizingReliable() || i === e.style[t]), ("auto" === i || !parseFloat(i) && "inline" === w.css(e, "display", !1, r)) && (i = e["offset" + t[0].toUpperCase() + t.slice(1)], a = !0), (i = parseFloat(i) || 0) + Ze(e, t, n || (o ? "border" : "content"), a, r, i) + "px";
  }

  w.extend({
    cssHooks: {
      opacity: {
        get: function get(e, t) {
          if (t) {
            var n = Fe(e, "opacity");
            return "" === n ? "1" : n;
          }
        }
      }
    },
    cssNumber: {
      animationIterationCount: !0,
      columnCount: !0,
      fillOpacity: !0,
      flexGrow: !0,
      flexShrink: !0,
      fontWeight: !0,
      lineHeight: !0,
      opacity: !0,
      order: !0,
      orphans: !0,
      widows: !0,
      zIndex: !0,
      zoom: !0
    },
    cssProps: {},
    style: function style(e, t, n, r) {
      if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
        var i,
            o,
            a,
            s = G(t),
            u = Xe.test(t),
            l = e.style;
        if (u || (t = Je(s)), a = w.cssHooks[t] || w.cssHooks[s], void 0 === n) return a && "get" in a && void 0 !== (i = a.get(e, !1, r)) ? i : l[t];
        "string" == (o = _typeof(n)) && (i = ie.exec(n)) && i[1] && (n = ue(e, t, i), o = "number"), null != n && n === n && ("number" === o && (n += i && i[3] || (w.cssNumber[s] ? "" : "px")), h.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"), a && "set" in a && void 0 === (n = a.set(e, n, r)) || (u ? l.setProperty(t, n) : l[t] = n));
      }
    },
    css: function css(e, t, n, r) {
      var i,
          o,
          a,
          s = G(t);
      return Xe.test(t) || (t = Je(s)), (a = w.cssHooks[t] || w.cssHooks[s]) && "get" in a && (i = a.get(e, !0, n)), void 0 === i && (i = Fe(e, t, r)), "normal" === i && t in Ve && (i = Ve[t]), "" === n || n ? (o = parseFloat(i), !0 === n || isFinite(o) ? o || 0 : i) : i;
    }
  }), w.each(["height", "width"], function (e, t) {
    w.cssHooks[t] = {
      get: function get(e, n, r) {
        if (n) return !ze.test(w.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? et(e, t, r) : se(e, Ue, function () {
          return et(e, t, r);
        });
      },
      set: function set(e, n, r) {
        var i,
            o = $e(e),
            a = "border-box" === w.css(e, "boxSizing", !1, o),
            s = r && Ze(e, t, r, a, o);
        return a && h.scrollboxSize() === o.position && (s -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(o[t]) - Ze(e, t, "border", !1, o) - .5)), s && (i = ie.exec(n)) && "px" !== (i[3] || "px") && (e.style[t] = n, n = w.css(e, t)), Ke(e, n, s);
      }
    };
  }), w.cssHooks.marginLeft = _e(h.reliableMarginLeft, function (e, t) {
    if (t) return (parseFloat(Fe(e, "marginLeft")) || e.getBoundingClientRect().left - se(e, {
      marginLeft: 0
    }, function () {
      return e.getBoundingClientRect().left;
    })) + "px";
  }), w.each({
    margin: "",
    padding: "",
    border: "Width"
  }, function (e, t) {
    w.cssHooks[e + t] = {
      expand: function expand(n) {
        for (var r = 0, i = {}, o = "string" == typeof n ? n.split(" ") : [n]; r < 4; r++) {
          i[e + oe[r] + t] = o[r] || o[r - 2] || o[0];
        }

        return i;
      }
    }, "margin" !== e && (w.cssHooks[e + t].set = Ke);
  }), w.fn.extend({
    css: function css(e, t) {
      return z(this, function (e, t, n) {
        var r,
            i,
            o = {},
            a = 0;

        if (Array.isArray(t)) {
          for (r = $e(e), i = t.length; a < i; a++) {
            o[t[a]] = w.css(e, t[a], !1, r);
          }

          return o;
        }

        return void 0 !== n ? w.style(e, t, n) : w.css(e, t);
      }, e, t, arguments.length > 1);
    }
  });

  function tt(e, t, n, r, i) {
    return new tt.prototype.init(e, t, n, r, i);
  }

  w.Tween = tt, tt.prototype = {
    constructor: tt,
    init: function init(e, t, n, r, i, o) {
      this.elem = e, this.prop = n, this.easing = i || w.easing._default, this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = o || (w.cssNumber[n] ? "" : "px");
    },
    cur: function cur() {
      var e = tt.propHooks[this.prop];
      return e && e.get ? e.get(this) : tt.propHooks._default.get(this);
    },
    run: function run(e) {
      var t,
          n = tt.propHooks[this.prop];
      return this.options.duration ? this.pos = t = w.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : tt.propHooks._default.set(this), this;
    }
  }, tt.prototype.init.prototype = tt.prototype, tt.propHooks = {
    _default: {
      get: function get(e) {
        var t;
        return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e.prop] ? e.elem[e.prop] : (t = w.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0;
      },
      set: function set(e) {
        w.fx.step[e.prop] ? w.fx.step[e.prop](e) : 1 !== e.elem.nodeType || null == e.elem.style[w.cssProps[e.prop]] && !w.cssHooks[e.prop] ? e.elem[e.prop] = e.now : w.style(e.elem, e.prop, e.now + e.unit);
      }
    }
  }, tt.propHooks.scrollTop = tt.propHooks.scrollLeft = {
    set: function set(e) {
      e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now);
    }
  }, w.easing = {
    linear: function linear(e) {
      return e;
    },
    swing: function swing(e) {
      return .5 - Math.cos(e * Math.PI) / 2;
    },
    _default: "swing"
  }, w.fx = tt.prototype.init, w.fx.step = {};
  var nt,
      rt,
      it = /^(?:toggle|show|hide)$/,
      ot = /queueHooks$/;

  function at() {
    rt && (!1 === r.hidden && e.requestAnimationFrame ? e.requestAnimationFrame(at) : e.setTimeout(at, w.fx.interval), w.fx.tick());
  }

  function st() {
    return e.setTimeout(function () {
      nt = void 0;
    }), nt = Date.now();
  }

  function ut(e, t) {
    var n,
        r = 0,
        i = {
      height: e
    };

    for (t = t ? 1 : 0; r < 4; r += 2 - t) {
      i["margin" + (n = oe[r])] = i["padding" + n] = e;
    }

    return t && (i.opacity = i.width = e), i;
  }

  function lt(e, t, n) {
    for (var r, i = (pt.tweeners[t] || []).concat(pt.tweeners["*"]), o = 0, a = i.length; o < a; o++) {
      if (r = i[o].call(n, t, e)) return r;
    }
  }

  function ct(e, t, n) {
    var r,
        i,
        o,
        a,
        s,
        u,
        l,
        c,
        f = "width" in t || "height" in t,
        p = this,
        d = {},
        h = e.style,
        g = e.nodeType && ae(e),
        y = J.get(e, "fxshow");
    n.queue || (null == (a = w._queueHooks(e, "fx")).unqueued && (a.unqueued = 0, s = a.empty.fire, a.empty.fire = function () {
      a.unqueued || s();
    }), a.unqueued++, p.always(function () {
      p.always(function () {
        a.unqueued--, w.queue(e, "fx").length || a.empty.fire();
      });
    }));

    for (r in t) {
      if (i = t[r], it.test(i)) {
        if (delete t[r], o = o || "toggle" === i, i === (g ? "hide" : "show")) {
          if ("show" !== i || !y || void 0 === y[r]) continue;
          g = !0;
        }

        d[r] = y && y[r] || w.style(e, r);
      }
    }

    if ((u = !w.isEmptyObject(t)) || !w.isEmptyObject(d)) {
      f && 1 === e.nodeType && (n.overflow = [h.overflow, h.overflowX, h.overflowY], null == (l = y && y.display) && (l = J.get(e, "display")), "none" === (c = w.css(e, "display")) && (l ? c = l : (fe([e], !0), l = e.style.display || l, c = w.css(e, "display"), fe([e]))), ("inline" === c || "inline-block" === c && null != l) && "none" === w.css(e, "float") && (u || (p.done(function () {
        h.display = l;
      }), null == l && (c = h.display, l = "none" === c ? "" : c)), h.display = "inline-block")), n.overflow && (h.overflow = "hidden", p.always(function () {
        h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2];
      })), u = !1;

      for (r in d) {
        u || (y ? "hidden" in y && (g = y.hidden) : y = J.access(e, "fxshow", {
          display: l
        }), o && (y.hidden = !g), g && fe([e], !0), p.done(function () {
          g || fe([e]), J.remove(e, "fxshow");

          for (r in d) {
            w.style(e, r, d[r]);
          }
        })), u = lt(g ? y[r] : 0, r, p), r in y || (y[r] = u.start, g && (u.end = u.start, u.start = 0));
      }
    }
  }

  function ft(e, t) {
    var n, r, i, o, a;

    for (n in e) {
      if (r = G(n), i = t[r], o = e[n], Array.isArray(o) && (i = o[1], o = e[n] = o[0]), n !== r && (e[r] = o, delete e[n]), (a = w.cssHooks[r]) && "expand" in a) {
        o = a.expand(o), delete e[r];

        for (n in o) {
          n in e || (e[n] = o[n], t[n] = i);
        }
      } else t[r] = i;
    }
  }

  function pt(e, t, n) {
    var r,
        i,
        o = 0,
        a = pt.prefilters.length,
        s = w.Deferred().always(function () {
      delete u.elem;
    }),
        u = function u() {
      if (i) return !1;

      for (var t = nt || st(), n = Math.max(0, l.startTime + l.duration - t), r = 1 - (n / l.duration || 0), o = 0, a = l.tweens.length; o < a; o++) {
        l.tweens[o].run(r);
      }

      return s.notifyWith(e, [l, r, n]), r < 1 && a ? n : (a || s.notifyWith(e, [l, 1, 0]), s.resolveWith(e, [l]), !1);
    },
        l = s.promise({
      elem: e,
      props: w.extend({}, t),
      opts: w.extend(!0, {
        specialEasing: {},
        easing: w.easing._default
      }, n),
      originalProperties: t,
      originalOptions: n,
      startTime: nt || st(),
      duration: n.duration,
      tweens: [],
      createTween: function createTween(t, n) {
        var r = w.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
        return l.tweens.push(r), r;
      },
      stop: function stop(t) {
        var n = 0,
            r = t ? l.tweens.length : 0;
        if (i) return this;

        for (i = !0; n < r; n++) {
          l.tweens[n].run(1);
        }

        return t ? (s.notifyWith(e, [l, 1, 0]), s.resolveWith(e, [l, t])) : s.rejectWith(e, [l, t]), this;
      }
    }),
        c = l.props;

    for (ft(c, l.opts.specialEasing); o < a; o++) {
      if (r = pt.prefilters[o].call(l, e, c, l.opts)) return g(r.stop) && (w._queueHooks(l.elem, l.opts.queue).stop = r.stop.bind(r)), r;
    }

    return w.map(c, lt, l), g(l.opts.start) && l.opts.start.call(e, l), l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always), w.fx.timer(w.extend(u, {
      elem: e,
      anim: l,
      queue: l.opts.queue
    })), l;
  }

  w.Animation = w.extend(pt, {
    tweeners: {
      "*": [function (e, t) {
        var n = this.createTween(e, t);
        return ue(n.elem, e, ie.exec(t), n), n;
      }]
    },
    tweener: function tweener(e, t) {
      g(e) ? (t = e, e = ["*"]) : e = e.match(M);

      for (var n, r = 0, i = e.length; r < i; r++) {
        n = e[r], pt.tweeners[n] = pt.tweeners[n] || [], pt.tweeners[n].unshift(t);
      }
    },
    prefilters: [ct],
    prefilter: function prefilter(e, t) {
      t ? pt.prefilters.unshift(e) : pt.prefilters.push(e);
    }
  }), w.speed = function (e, t, n) {
    var r = e && "object" == _typeof(e) ? w.extend({}, e) : {
      complete: n || !n && t || g(e) && e,
      duration: e,
      easing: n && t || t && !g(t) && t
    };
    return w.fx.off ? r.duration = 0 : "number" != typeof r.duration && (r.duration in w.fx.speeds ? r.duration = w.fx.speeds[r.duration] : r.duration = w.fx.speeds._default), null != r.queue && !0 !== r.queue || (r.queue = "fx"), r.old = r.complete, r.complete = function () {
      g(r.old) && r.old.call(this), r.queue && w.dequeue(this, r.queue);
    }, r;
  }, w.fn.extend({
    fadeTo: function fadeTo(e, t, n, r) {
      return this.filter(ae).css("opacity", 0).show().end().animate({
        opacity: t
      }, e, n, r);
    },
    animate: function animate(e, t, n, r) {
      var i = w.isEmptyObject(e),
          o = w.speed(t, n, r),
          a = function a() {
        var t = pt(this, w.extend({}, e), o);
        (i || J.get(this, "finish")) && t.stop(!0);
      };

      return a.finish = a, i || !1 === o.queue ? this.each(a) : this.queue(o.queue, a);
    },
    stop: function stop(e, t, n) {
      var r = function r(e) {
        var t = e.stop;
        delete e.stop, t(n);
      };

      return "string" != typeof e && (n = t, t = e, e = void 0), t && !1 !== e && this.queue(e || "fx", []), this.each(function () {
        var t = !0,
            i = null != e && e + "queueHooks",
            o = w.timers,
            a = J.get(this);
        if (i) a[i] && a[i].stop && r(a[i]);else for (i in a) {
          a[i] && a[i].stop && ot.test(i) && r(a[i]);
        }

        for (i = o.length; i--;) {
          o[i].elem !== this || null != e && o[i].queue !== e || (o[i].anim.stop(n), t = !1, o.splice(i, 1));
        }

        !t && n || w.dequeue(this, e);
      });
    },
    finish: function finish(e) {
      return !1 !== e && (e = e || "fx"), this.each(function () {
        var t,
            n = J.get(this),
            r = n[e + "queue"],
            i = n[e + "queueHooks"],
            o = w.timers,
            a = r ? r.length : 0;

        for (n.finish = !0, w.queue(this, e, []), i && i.stop && i.stop.call(this, !0), t = o.length; t--;) {
          o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
        }

        for (t = 0; t < a; t++) {
          r[t] && r[t].finish && r[t].finish.call(this);
        }

        delete n.finish;
      });
    }
  }), w.each(["toggle", "show", "hide"], function (e, t) {
    var n = w.fn[t];

    w.fn[t] = function (e, r, i) {
      return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(ut(t, !0), e, r, i);
    };
  }), w.each({
    slideDown: ut("show"),
    slideUp: ut("hide"),
    slideToggle: ut("toggle"),
    fadeIn: {
      opacity: "show"
    },
    fadeOut: {
      opacity: "hide"
    },
    fadeToggle: {
      opacity: "toggle"
    }
  }, function (e, t) {
    w.fn[e] = function (e, n, r) {
      return this.animate(t, e, n, r);
    };
  }), w.timers = [], w.fx.tick = function () {
    var e,
        t = 0,
        n = w.timers;

    for (nt = Date.now(); t < n.length; t++) {
      (e = n[t])() || n[t] !== e || n.splice(t--, 1);
    }

    n.length || w.fx.stop(), nt = void 0;
  }, w.fx.timer = function (e) {
    w.timers.push(e), w.fx.start();
  }, w.fx.interval = 13, w.fx.start = function () {
    rt || (rt = !0, at());
  }, w.fx.stop = function () {
    rt = null;
  }, w.fx.speeds = {
    slow: 600,
    fast: 200,
    _default: 400
  }, w.fn.delay = function (t, n) {
    return t = w.fx ? w.fx.speeds[t] || t : t, n = n || "fx", this.queue(n, function (n, r) {
      var i = e.setTimeout(n, t);

      r.stop = function () {
        e.clearTimeout(i);
      };
    });
  }, function () {
    var e = r.createElement("input"),
        t = r.createElement("select").appendChild(r.createElement("option"));
    e.type = "checkbox", h.checkOn = "" !== e.value, h.optSelected = t.selected, (e = r.createElement("input")).value = "t", e.type = "radio", h.radioValue = "t" === e.value;
  }();
  var dt,
      ht = w.expr.attrHandle;
  w.fn.extend({
    attr: function attr(e, t) {
      return z(this, w.attr, e, t, arguments.length > 1);
    },
    removeAttr: function removeAttr(e) {
      return this.each(function () {
        w.removeAttr(this, e);
      });
    }
  }), w.extend({
    attr: function attr(e, t, n) {
      var r,
          i,
          o = e.nodeType;
      if (3 !== o && 8 !== o && 2 !== o) return "undefined" == typeof e.getAttribute ? w.prop(e, t, n) : (1 === o && w.isXMLDoc(e) || (i = w.attrHooks[t.toLowerCase()] || (w.expr.match.bool.test(t) ? dt : void 0)), void 0 !== n ? null === n ? void w.removeAttr(e, t) : i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : (e.setAttribute(t, n + ""), n) : i && "get" in i && null !== (r = i.get(e, t)) ? r : null == (r = w.find.attr(e, t)) ? void 0 : r);
    },
    attrHooks: {
      type: {
        set: function set(e, t) {
          if (!h.radioValue && "radio" === t && N(e, "input")) {
            var n = e.value;
            return e.setAttribute("type", t), n && (e.value = n), t;
          }
        }
      }
    },
    removeAttr: function removeAttr(e, t) {
      var n,
          r = 0,
          i = t && t.match(M);
      if (i && 1 === e.nodeType) while (n = i[r++]) {
        e.removeAttribute(n);
      }
    }
  }), dt = {
    set: function set(e, t, n) {
      return !1 === t ? w.removeAttr(e, n) : e.setAttribute(n, n), n;
    }
  }, w.each(w.expr.match.bool.source.match(/\w+/g), function (e, t) {
    var n = ht[t] || w.find.attr;

    ht[t] = function (e, t, r) {
      var i,
          o,
          a = t.toLowerCase();
      return r || (o = ht[a], ht[a] = i, i = null != n(e, t, r) ? a : null, ht[a] = o), i;
    };
  });
  var gt = /^(?:input|select|textarea|button)$/i,
      yt = /^(?:a|area)$/i;
  w.fn.extend({
    prop: function prop(e, t) {
      return z(this, w.prop, e, t, arguments.length > 1);
    },
    removeProp: function removeProp(e) {
      return this.each(function () {
        delete this[w.propFix[e] || e];
      });
    }
  }), w.extend({
    prop: function prop(e, t, n) {
      var r,
          i,
          o = e.nodeType;
      if (3 !== o && 8 !== o && 2 !== o) return 1 === o && w.isXMLDoc(e) || (t = w.propFix[t] || t, i = w.propHooks[t]), void 0 !== n ? i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : e[t] = n : i && "get" in i && null !== (r = i.get(e, t)) ? r : e[t];
    },
    propHooks: {
      tabIndex: {
        get: function get(e) {
          var t = w.find.attr(e, "tabindex");
          return t ? parseInt(t, 10) : gt.test(e.nodeName) || yt.test(e.nodeName) && e.href ? 0 : -1;
        }
      }
    },
    propFix: {
      "for": "htmlFor",
      "class": "className"
    }
  }), h.optSelected || (w.propHooks.selected = {
    get: function get(e) {
      var t = e.parentNode;
      return t && t.parentNode && t.parentNode.selectedIndex, null;
    },
    set: function set(e) {
      var t = e.parentNode;
      t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex);
    }
  }), w.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
    w.propFix[this.toLowerCase()] = this;
  });

  function vt(e) {
    return (e.match(M) || []).join(" ");
  }

  function mt(e) {
    return e.getAttribute && e.getAttribute("class") || "";
  }

  function xt(e) {
    return Array.isArray(e) ? e : "string" == typeof e ? e.match(M) || [] : [];
  }

  w.fn.extend({
    addClass: function addClass(e) {
      var t,
          n,
          r,
          i,
          o,
          a,
          s,
          u = 0;
      if (g(e)) return this.each(function (t) {
        w(this).addClass(e.call(this, t, mt(this)));
      });
      if ((t = xt(e)).length) while (n = this[u++]) {
        if (i = mt(n), r = 1 === n.nodeType && " " + vt(i) + " ") {
          a = 0;

          while (o = t[a++]) {
            r.indexOf(" " + o + " ") < 0 && (r += o + " ");
          }

          i !== (s = vt(r)) && n.setAttribute("class", s);
        }
      }
      return this;
    },
    removeClass: function removeClass(e) {
      var t,
          n,
          r,
          i,
          o,
          a,
          s,
          u = 0;
      if (g(e)) return this.each(function (t) {
        w(this).removeClass(e.call(this, t, mt(this)));
      });
      if (!arguments.length) return this.attr("class", "");
      if ((t = xt(e)).length) while (n = this[u++]) {
        if (i = mt(n), r = 1 === n.nodeType && " " + vt(i) + " ") {
          a = 0;

          while (o = t[a++]) {
            while (r.indexOf(" " + o + " ") > -1) {
              r = r.replace(" " + o + " ", " ");
            }
          }

          i !== (s = vt(r)) && n.setAttribute("class", s);
        }
      }
      return this;
    },
    toggleClass: function toggleClass(e, t) {
      var n = _typeof(e),
          r = "string" === n || Array.isArray(e);

      return "boolean" == typeof t && r ? t ? this.addClass(e) : this.removeClass(e) : g(e) ? this.each(function (n) {
        w(this).toggleClass(e.call(this, n, mt(this), t), t);
      }) : this.each(function () {
        var t, i, o, a;

        if (r) {
          i = 0, o = w(this), a = xt(e);

          while (t = a[i++]) {
            o.hasClass(t) ? o.removeClass(t) : o.addClass(t);
          }
        } else void 0 !== e && "boolean" !== n || ((t = mt(this)) && J.set(this, "__className__", t), this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : J.get(this, "__className__") || ""));
      });
    },
    hasClass: function hasClass(e) {
      var t,
          n,
          r = 0;
      t = " " + e + " ";

      while (n = this[r++]) {
        if (1 === n.nodeType && (" " + vt(mt(n)) + " ").indexOf(t) > -1) return !0;
      }

      return !1;
    }
  });
  var bt = /\r/g;
  w.fn.extend({
    val: function val(e) {
      var t,
          n,
          r,
          i = this[0];
      {
        if (arguments.length) return r = g(e), this.each(function (n) {
          var i;
          1 === this.nodeType && (null == (i = r ? e.call(this, n, w(this).val()) : e) ? i = "" : "number" == typeof i ? i += "" : Array.isArray(i) && (i = w.map(i, function (e) {
            return null == e ? "" : e + "";
          })), (t = w.valHooks[this.type] || w.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, i, "value") || (this.value = i));
        });
        if (i) return (t = w.valHooks[i.type] || w.valHooks[i.nodeName.toLowerCase()]) && "get" in t && void 0 !== (n = t.get(i, "value")) ? n : "string" == typeof (n = i.value) ? n.replace(bt, "") : null == n ? "" : n;
      }
    }
  }), w.extend({
    valHooks: {
      option: {
        get: function get(e) {
          var t = w.find.attr(e, "value");
          return null != t ? t : vt(w.text(e));
        }
      },
      select: {
        get: function get(e) {
          var t,
              n,
              r,
              i = e.options,
              o = e.selectedIndex,
              a = "select-one" === e.type,
              s = a ? null : [],
              u = a ? o + 1 : i.length;

          for (r = o < 0 ? u : a ? o : 0; r < u; r++) {
            if (((n = i[r]).selected || r === o) && !n.disabled && (!n.parentNode.disabled || !N(n.parentNode, "optgroup"))) {
              if (t = w(n).val(), a) return t;
              s.push(t);
            }
          }

          return s;
        },
        set: function set(e, t) {
          var n,
              r,
              i = e.options,
              o = w.makeArray(t),
              a = i.length;

          while (a--) {
            ((r = i[a]).selected = w.inArray(w.valHooks.option.get(r), o) > -1) && (n = !0);
          }

          return n || (e.selectedIndex = -1), o;
        }
      }
    }
  }), w.each(["radio", "checkbox"], function () {
    w.valHooks[this] = {
      set: function set(e, t) {
        if (Array.isArray(t)) return e.checked = w.inArray(w(e).val(), t) > -1;
      }
    }, h.checkOn || (w.valHooks[this].get = function (e) {
      return null === e.getAttribute("value") ? "on" : e.value;
    });
  }), h.focusin = "onfocusin" in e;

  var wt = /^(?:focusinfocus|focusoutblur)$/,
      Tt = function Tt(e) {
    e.stopPropagation();
  };

  w.extend(w.event, {
    trigger: function trigger(t, n, i, o) {
      var a,
          s,
          u,
          l,
          c,
          p,
          d,
          h,
          v = [i || r],
          m = f.call(t, "type") ? t.type : t,
          x = f.call(t, "namespace") ? t.namespace.split(".") : [];

      if (s = h = u = i = i || r, 3 !== i.nodeType && 8 !== i.nodeType && !wt.test(m + w.event.triggered) && (m.indexOf(".") > -1 && (m = (x = m.split(".")).shift(), x.sort()), c = m.indexOf(":") < 0 && "on" + m, t = t[w.expando] ? t : new w.Event(m, "object" == _typeof(t) && t), t.isTrigger = o ? 2 : 3, t.namespace = x.join("."), t.rnamespace = t.namespace ? new RegExp("(^|\\.)" + x.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = i), n = null == n ? [t] : w.makeArray(n, [t]), d = w.event.special[m] || {}, o || !d.trigger || !1 !== d.trigger.apply(i, n))) {
        if (!o && !d.noBubble && !y(i)) {
          for (l = d.delegateType || m, wt.test(l + m) || (s = s.parentNode); s; s = s.parentNode) {
            v.push(s), u = s;
          }

          u === (i.ownerDocument || r) && v.push(u.defaultView || u.parentWindow || e);
        }

        a = 0;

        while ((s = v[a++]) && !t.isPropagationStopped()) {
          h = s, t.type = a > 1 ? l : d.bindType || m, (p = (J.get(s, "events") || {})[t.type] && J.get(s, "handle")) && p.apply(s, n), (p = c && s[c]) && p.apply && Y(s) && (t.result = p.apply(s, n), !1 === t.result && t.preventDefault());
        }

        return t.type = m, o || t.isDefaultPrevented() || d._default && !1 !== d._default.apply(v.pop(), n) || !Y(i) || c && g(i[m]) && !y(i) && ((u = i[c]) && (i[c] = null), w.event.triggered = m, t.isPropagationStopped() && h.addEventListener(m, Tt), i[m](), t.isPropagationStopped() && h.removeEventListener(m, Tt), w.event.triggered = void 0, u && (i[c] = u)), t.result;
      }
    },
    simulate: function simulate(e, t, n) {
      var r = w.extend(new w.Event(), n, {
        type: e,
        isSimulated: !0
      });
      w.event.trigger(r, null, t);
    }
  }), w.fn.extend({
    trigger: function trigger(e, t) {
      return this.each(function () {
        w.event.trigger(e, t, this);
      });
    },
    triggerHandler: function triggerHandler(e, t) {
      var n = this[0];
      if (n) return w.event.trigger(e, t, n, !0);
    }
  }), h.focusin || w.each({
    focus: "focusin",
    blur: "focusout"
  }, function (e, t) {
    var n = function n(e) {
      w.event.simulate(t, e.target, w.event.fix(e));
    };

    w.event.special[t] = {
      setup: function setup() {
        var r = this.ownerDocument || this,
            i = J.access(r, t);
        i || r.addEventListener(e, n, !0), J.access(r, t, (i || 0) + 1);
      },
      teardown: function teardown() {
        var r = this.ownerDocument || this,
            i = J.access(r, t) - 1;
        i ? J.access(r, t, i) : (r.removeEventListener(e, n, !0), J.remove(r, t));
      }
    };
  });
  var Ct = e.location,
      Et = Date.now(),
      kt = /\?/;

  w.parseXML = function (t) {
    var n;
    if (!t || "string" != typeof t) return null;

    try {
      n = new e.DOMParser().parseFromString(t, "text/xml");
    } catch (e) {
      n = void 0;
    }

    return n && !n.getElementsByTagName("parsererror").length || w.error("Invalid XML: " + t), n;
  };

  var St = /\[\]$/,
      Dt = /\r?\n/g,
      Nt = /^(?:submit|button|image|reset|file)$/i,
      At = /^(?:input|select|textarea|keygen)/i;

  function jt(e, t, n, r) {
    var i;
    if (Array.isArray(t)) w.each(t, function (t, i) {
      n || St.test(e) ? r(e, i) : jt(e + "[" + ("object" == _typeof(i) && null != i ? t : "") + "]", i, n, r);
    });else if (n || "object" !== x(t)) r(e, t);else for (i in t) {
      jt(e + "[" + i + "]", t[i], n, r);
    }
  }

  w.param = function (e, t) {
    var n,
        r = [],
        i = function i(e, t) {
      var n = g(t) ? t() : t;
      r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n);
    };

    if (Array.isArray(e) || e.jquery && !w.isPlainObject(e)) w.each(e, function () {
      i(this.name, this.value);
    });else for (n in e) {
      jt(n, e[n], t, i);
    }
    return r.join("&");
  }, w.fn.extend({
    serialize: function serialize() {
      return w.param(this.serializeArray());
    },
    serializeArray: function serializeArray() {
      return this.map(function () {
        var e = w.prop(this, "elements");
        return e ? w.makeArray(e) : this;
      }).filter(function () {
        var e = this.type;
        return this.name && !w(this).is(":disabled") && At.test(this.nodeName) && !Nt.test(e) && (this.checked || !pe.test(e));
      }).map(function (e, t) {
        var n = w(this).val();
        return null == n ? null : Array.isArray(n) ? w.map(n, function (e) {
          return {
            name: t.name,
            value: e.replace(Dt, "\r\n")
          };
        }) : {
          name: t.name,
          value: n.replace(Dt, "\r\n")
        };
      }).get();
    }
  });
  var qt = /%20/g,
      Lt = /#.*$/,
      Ht = /([?&])_=[^&]*/,
      Ot = /^(.*?):[ \t]*([^\r\n]*)$/gm,
      Pt = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
      Mt = /^(?:GET|HEAD)$/,
      Rt = /^\/\//,
      It = {},
      Wt = {},
      $t = "*/".concat("*"),
      Bt = r.createElement("a");
  Bt.href = Ct.href;

  function Ft(e) {
    return function (t, n) {
      "string" != typeof t && (n = t, t = "*");
      var r,
          i = 0,
          o = t.toLowerCase().match(M) || [];
      if (g(n)) while (r = o[i++]) {
        "+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n);
      }
    };
  }

  function _t(e, t, n, r) {
    var i = {},
        o = e === Wt;

    function a(s) {
      var u;
      return i[s] = !0, w.each(e[s] || [], function (e, s) {
        var l = s(t, n, r);
        return "string" != typeof l || o || i[l] ? o ? !(u = l) : void 0 : (t.dataTypes.unshift(l), a(l), !1);
      }), u;
    }

    return a(t.dataTypes[0]) || !i["*"] && a("*");
  }

  function zt(e, t) {
    var n,
        r,
        i = w.ajaxSettings.flatOptions || {};

    for (n in t) {
      void 0 !== t[n] && ((i[n] ? e : r || (r = {}))[n] = t[n]);
    }

    return r && w.extend(!0, e, r), e;
  }

  function Xt(e, t, n) {
    var r,
        i,
        o,
        a,
        s = e.contents,
        u = e.dataTypes;

    while ("*" === u[0]) {
      u.shift(), void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
    }

    if (r) for (i in s) {
      if (s[i] && s[i].test(r)) {
        u.unshift(i);
        break;
      }
    }
    if (u[0] in n) o = u[0];else {
      for (i in n) {
        if (!u[0] || e.converters[i + " " + u[0]]) {
          o = i;
          break;
        }

        a || (a = i);
      }

      o = o || a;
    }
    if (o) return o !== u[0] && u.unshift(o), n[o];
  }

  function Ut(e, t, n, r) {
    var i,
        o,
        a,
        s,
        u,
        l = {},
        c = e.dataTypes.slice();
    if (c[1]) for (a in e.converters) {
      l[a.toLowerCase()] = e.converters[a];
    }
    o = c.shift();

    while (o) {
      if (e.responseFields[o] && (n[e.responseFields[o]] = t), !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), u = o, o = c.shift()) if ("*" === o) o = u;else if ("*" !== u && u !== o) {
        if (!(a = l[u + " " + o] || l["* " + o])) for (i in l) {
          if ((s = i.split(" "))[1] === o && (a = l[u + " " + s[0]] || l["* " + s[0]])) {
            !0 === a ? a = l[i] : !0 !== l[i] && (o = s[0], c.unshift(s[1]));
            break;
          }
        }
        if (!0 !== a) if (a && e["throws"]) t = a(t);else try {
          t = a(t);
        } catch (e) {
          return {
            state: "parsererror",
            error: a ? e : "No conversion from " + u + " to " + o
          };
        }
      }
    }

    return {
      state: "success",
      data: t
    };
  }

  w.extend({
    active: 0,
    lastModified: {},
    etag: {},
    ajaxSettings: {
      url: Ct.href,
      type: "GET",
      isLocal: Pt.test(Ct.protocol),
      global: !0,
      processData: !0,
      async: !0,
      contentType: "application/x-www-form-urlencoded; charset=UTF-8",
      accepts: {
        "*": $t,
        text: "text/plain",
        html: "text/html",
        xml: "application/xml, text/xml",
        json: "application/json, text/javascript"
      },
      contents: {
        xml: /\bxml\b/,
        html: /\bhtml/,
        json: /\bjson\b/
      },
      responseFields: {
        xml: "responseXML",
        text: "responseText",
        json: "responseJSON"
      },
      converters: {
        "* text": String,
        "text html": !0,
        "text json": JSON.parse,
        "text xml": w.parseXML
      },
      flatOptions: {
        url: !0,
        context: !0
      }
    },
    ajaxSetup: function ajaxSetup(e, t) {
      return t ? zt(zt(e, w.ajaxSettings), t) : zt(w.ajaxSettings, e);
    },
    ajaxPrefilter: Ft(It),
    ajaxTransport: Ft(Wt),
    ajax: function ajax(t, n) {
      "object" == _typeof(t) && (n = t, t = void 0), n = n || {};
      var i,
          o,
          a,
          s,
          u,
          l,
          c,
          f,
          p,
          d,
          h = w.ajaxSetup({}, n),
          g = h.context || h,
          y = h.context && (g.nodeType || g.jquery) ? w(g) : w.event,
          v = w.Deferred(),
          m = w.Callbacks("once memory"),
          x = h.statusCode || {},
          b = {},
          T = {},
          C = "canceled",
          E = {
        readyState: 0,
        getResponseHeader: function getResponseHeader(e) {
          var t;

          if (c) {
            if (!s) {
              s = {};

              while (t = Ot.exec(a)) {
                s[t[1].toLowerCase()] = t[2];
              }
            }

            t = s[e.toLowerCase()];
          }

          return null == t ? null : t;
        },
        getAllResponseHeaders: function getAllResponseHeaders() {
          return c ? a : null;
        },
        setRequestHeader: function setRequestHeader(e, t) {
          return null == c && (e = T[e.toLowerCase()] = T[e.toLowerCase()] || e, b[e] = t), this;
        },
        overrideMimeType: function overrideMimeType(e) {
          return null == c && (h.mimeType = e), this;
        },
        statusCode: function statusCode(e) {
          var t;
          if (e) if (c) E.always(e[E.status]);else for (t in e) {
            x[t] = [x[t], e[t]];
          }
          return this;
        },
        abort: function abort(e) {
          var t = e || C;
          return i && i.abort(t), k(0, t), this;
        }
      };

      if (v.promise(E), h.url = ((t || h.url || Ct.href) + "").replace(Rt, Ct.protocol + "//"), h.type = n.method || n.type || h.method || h.type, h.dataTypes = (h.dataType || "*").toLowerCase().match(M) || [""], null == h.crossDomain) {
        l = r.createElement("a");

        try {
          l.href = h.url, l.href = l.href, h.crossDomain = Bt.protocol + "//" + Bt.host != l.protocol + "//" + l.host;
        } catch (e) {
          h.crossDomain = !0;
        }
      }

      if (h.data && h.processData && "string" != typeof h.data && (h.data = w.param(h.data, h.traditional)), _t(It, h, n, E), c) return E;
      (f = w.event && h.global) && 0 == w.active++ && w.event.trigger("ajaxStart"), h.type = h.type.toUpperCase(), h.hasContent = !Mt.test(h.type), o = h.url.replace(Lt, ""), h.hasContent ? h.data && h.processData && 0 === (h.contentType || "").indexOf("application/x-www-form-urlencoded") && (h.data = h.data.replace(qt, "+")) : (d = h.url.slice(o.length), h.data && (h.processData || "string" == typeof h.data) && (o += (kt.test(o) ? "&" : "?") + h.data, delete h.data), !1 === h.cache && (o = o.replace(Ht, "$1"), d = (kt.test(o) ? "&" : "?") + "_=" + Et++ + d), h.url = o + d), h.ifModified && (w.lastModified[o] && E.setRequestHeader("If-Modified-Since", w.lastModified[o]), w.etag[o] && E.setRequestHeader("If-None-Match", w.etag[o])), (h.data && h.hasContent && !1 !== h.contentType || n.contentType) && E.setRequestHeader("Content-Type", h.contentType), E.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + $t + "; q=0.01" : "") : h.accepts["*"]);

      for (p in h.headers) {
        E.setRequestHeader(p, h.headers[p]);
      }

      if (h.beforeSend && (!1 === h.beforeSend.call(g, E, h) || c)) return E.abort();

      if (C = "abort", m.add(h.complete), E.done(h.success), E.fail(h.error), i = _t(Wt, h, n, E)) {
        if (E.readyState = 1, f && y.trigger("ajaxSend", [E, h]), c) return E;
        h.async && h.timeout > 0 && (u = e.setTimeout(function () {
          E.abort("timeout");
        }, h.timeout));

        try {
          c = !1, i.send(b, k);
        } catch (e) {
          if (c) throw e;
          k(-1, e);
        }
      } else k(-1, "No Transport");

      function k(t, n, r, s) {
        var l,
            p,
            d,
            b,
            T,
            C = n;
        c || (c = !0, u && e.clearTimeout(u), i = void 0, a = s || "", E.readyState = t > 0 ? 4 : 0, l = t >= 200 && t < 300 || 304 === t, r && (b = Xt(h, E, r)), b = Ut(h, b, E, l), l ? (h.ifModified && ((T = E.getResponseHeader("Last-Modified")) && (w.lastModified[o] = T), (T = E.getResponseHeader("etag")) && (w.etag[o] = T)), 204 === t || "HEAD" === h.type ? C = "nocontent" : 304 === t ? C = "notmodified" : (C = b.state, p = b.data, l = !(d = b.error))) : (d = C, !t && C || (C = "error", t < 0 && (t = 0))), E.status = t, E.statusText = (n || C) + "", l ? v.resolveWith(g, [p, C, E]) : v.rejectWith(g, [E, C, d]), E.statusCode(x), x = void 0, f && y.trigger(l ? "ajaxSuccess" : "ajaxError", [E, h, l ? p : d]), m.fireWith(g, [E, C]), f && (y.trigger("ajaxComplete", [E, h]), --w.active || w.event.trigger("ajaxStop")));
      }

      return E;
    },
    getJSON: function getJSON(e, t, n) {
      return w.get(e, t, n, "json");
    },
    getScript: function getScript(e, t) {
      return w.get(e, void 0, t, "script");
    }
  }), w.each(["get", "post"], function (e, t) {
    w[t] = function (e, n, r, i) {
      return g(n) && (i = i || r, r = n, n = void 0), w.ajax(w.extend({
        url: e,
        type: t,
        dataType: i,
        data: n,
        success: r
      }, w.isPlainObject(e) && e));
    };
  }), w._evalUrl = function (e) {
    return w.ajax({
      url: e,
      type: "GET",
      dataType: "script",
      cache: !0,
      async: !1,
      global: !1,
      "throws": !0
    });
  }, w.fn.extend({
    wrapAll: function wrapAll(e) {
      var t;
      return this[0] && (g(e) && (e = e.call(this[0])), t = w(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function () {
        var e = this;

        while (e.firstElementChild) {
          e = e.firstElementChild;
        }

        return e;
      }).append(this)), this;
    },
    wrapInner: function wrapInner(e) {
      return g(e) ? this.each(function (t) {
        w(this).wrapInner(e.call(this, t));
      }) : this.each(function () {
        var t = w(this),
            n = t.contents();
        n.length ? n.wrapAll(e) : t.append(e);
      });
    },
    wrap: function wrap(e) {
      var t = g(e);
      return this.each(function (n) {
        w(this).wrapAll(t ? e.call(this, n) : e);
      });
    },
    unwrap: function unwrap(e) {
      return this.parent(e).not("body").each(function () {
        w(this).replaceWith(this.childNodes);
      }), this;
    }
  }), w.expr.pseudos.hidden = function (e) {
    return !w.expr.pseudos.visible(e);
  }, w.expr.pseudos.visible = function (e) {
    return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length);
  }, w.ajaxSettings.xhr = function () {
    try {
      return new e.XMLHttpRequest();
    } catch (e) {}
  };
  var Vt = {
    0: 200,
    1223: 204
  },
      Gt = w.ajaxSettings.xhr();
  h.cors = !!Gt && "withCredentials" in Gt, h.ajax = Gt = !!Gt, w.ajaxTransport(function (t) {
    var _n, r;

    if (h.cors || Gt && !t.crossDomain) return {
      send: function send(i, o) {
        var a,
            s = t.xhr();
        if (s.open(t.type, t.url, t.async, t.username, t.password), t.xhrFields) for (a in t.xhrFields) {
          s[a] = t.xhrFields[a];
        }
        t.mimeType && s.overrideMimeType && s.overrideMimeType(t.mimeType), t.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest");

        for (a in i) {
          s.setRequestHeader(a, i[a]);
        }

        _n = function n(e) {
          return function () {
            _n && (_n = r = s.onload = s.onerror = s.onabort = s.ontimeout = s.onreadystatechange = null, "abort" === e ? s.abort() : "error" === e ? "number" != typeof s.status ? o(0, "error") : o(s.status, s.statusText) : o(Vt[s.status] || s.status, s.statusText, "text" !== (s.responseType || "text") || "string" != typeof s.responseText ? {
              binary: s.response
            } : {
              text: s.responseText
            }, s.getAllResponseHeaders()));
          };
        }, s.onload = _n(), r = s.onerror = s.ontimeout = _n("error"), void 0 !== s.onabort ? s.onabort = r : s.onreadystatechange = function () {
          4 === s.readyState && e.setTimeout(function () {
            _n && r();
          });
        }, _n = _n("abort");

        try {
          s.send(t.hasContent && t.data || null);
        } catch (e) {
          if (_n) throw e;
        }
      },
      abort: function abort() {
        _n && _n();
      }
    };
  }), w.ajaxPrefilter(function (e) {
    e.crossDomain && (e.contents.script = !1);
  }), w.ajaxSetup({
    accepts: {
      script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
    },
    contents: {
      script: /\b(?:java|ecma)script\b/
    },
    converters: {
      "text script": function textScript(e) {
        return w.globalEval(e), e;
      }
    }
  }), w.ajaxPrefilter("script", function (e) {
    void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET");
  }), w.ajaxTransport("script", function (e) {
    if (e.crossDomain) {
      var t, _n2;

      return {
        send: function send(i, o) {
          t = w("<script>").prop({
            charset: e.scriptCharset,
            src: e.url
          }).on("load error", _n2 = function n(e) {
            t.remove(), _n2 = null, e && o("error" === e.type ? 404 : 200, e.type);
          }), r.head.appendChild(t[0]);
        },
        abort: function abort() {
          _n2 && _n2();
        }
      };
    }
  });
  var Yt = [],
      Qt = /(=)\?(?=&|$)|\?\?/;
  w.ajaxSetup({
    jsonp: "callback",
    jsonpCallback: function jsonpCallback() {
      var e = Yt.pop() || w.expando + "_" + Et++;
      return this[e] = !0, e;
    }
  }), w.ajaxPrefilter("json jsonp", function (t, n, r) {
    var i,
        o,
        a,
        s = !1 !== t.jsonp && (Qt.test(t.url) ? "url" : "string" == typeof t.data && 0 === (t.contentType || "").indexOf("application/x-www-form-urlencoded") && Qt.test(t.data) && "data");
    if (s || "jsonp" === t.dataTypes[0]) return i = t.jsonpCallback = g(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, s ? t[s] = t[s].replace(Qt, "$1" + i) : !1 !== t.jsonp && (t.url += (kt.test(t.url) ? "&" : "?") + t.jsonp + "=" + i), t.converters["script json"] = function () {
      return a || w.error(i + " was not called"), a[0];
    }, t.dataTypes[0] = "json", o = e[i], e[i] = function () {
      a = arguments;
    }, r.always(function () {
      void 0 === o ? w(e).removeProp(i) : e[i] = o, t[i] && (t.jsonpCallback = n.jsonpCallback, Yt.push(i)), a && g(o) && o(a[0]), a = o = void 0;
    }), "script";
  }), h.createHTMLDocument = function () {
    var e = r.implementation.createHTMLDocument("").body;
    return e.innerHTML = "<form></form><form></form>", 2 === e.childNodes.length;
  }(), w.parseHTML = function (e, t, n) {
    if ("string" != typeof e) return [];
    "boolean" == typeof t && (n = t, t = !1);
    var i, o, a;
    return t || (h.createHTMLDocument ? ((i = (t = r.implementation.createHTMLDocument("")).createElement("base")).href = r.location.href, t.head.appendChild(i)) : t = r), o = A.exec(e), a = !n && [], o ? [t.createElement(o[1])] : (o = xe([e], t, a), a && a.length && w(a).remove(), w.merge([], o.childNodes));
  }, w.fn.load = function (e, t, n) {
    var r,
        i,
        o,
        a = this,
        s = e.indexOf(" ");
    return s > -1 && (r = vt(e.slice(s)), e = e.slice(0, s)), g(t) ? (n = t, t = void 0) : t && "object" == _typeof(t) && (i = "POST"), a.length > 0 && w.ajax({
      url: e,
      type: i || "GET",
      dataType: "html",
      data: t
    }).done(function (e) {
      o = arguments, a.html(r ? w("<div>").append(w.parseHTML(e)).find(r) : e);
    }).always(n && function (e, t) {
      a.each(function () {
        n.apply(this, o || [e.responseText, t, e]);
      });
    }), this;
  }, w.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (e, t) {
    w.fn[t] = function (e) {
      return this.on(t, e);
    };
  }), w.expr.pseudos.animated = function (e) {
    return w.grep(w.timers, function (t) {
      return e === t.elem;
    }).length;
  }, w.offset = {
    setOffset: function setOffset(e, t, n) {
      var r,
          i,
          o,
          a,
          s,
          u,
          l,
          c = w.css(e, "position"),
          f = w(e),
          p = {};
      "static" === c && (e.style.position = "relative"), s = f.offset(), o = w.css(e, "top"), u = w.css(e, "left"), (l = ("absolute" === c || "fixed" === c) && (o + u).indexOf("auto") > -1) ? (a = (r = f.position()).top, i = r.left) : (a = parseFloat(o) || 0, i = parseFloat(u) || 0), g(t) && (t = t.call(e, n, w.extend({}, s))), null != t.top && (p.top = t.top - s.top + a), null != t.left && (p.left = t.left - s.left + i), "using" in t ? t.using.call(e, p) : f.css(p);
    }
  }, w.fn.extend({
    offset: function offset(e) {
      if (arguments.length) return void 0 === e ? this : this.each(function (t) {
        w.offset.setOffset(this, e, t);
      });
      var t,
          n,
          r = this[0];
      if (r) return r.getClientRects().length ? (t = r.getBoundingClientRect(), n = r.ownerDocument.defaultView, {
        top: t.top + n.pageYOffset,
        left: t.left + n.pageXOffset
      }) : {
        top: 0,
        left: 0
      };
    },
    position: function position() {
      if (this[0]) {
        var e,
            t,
            n,
            r = this[0],
            i = {
          top: 0,
          left: 0
        };
        if ("fixed" === w.css(r, "position")) t = r.getBoundingClientRect();else {
          t = this.offset(), n = r.ownerDocument, e = r.offsetParent || n.documentElement;

          while (e && (e === n.body || e === n.documentElement) && "static" === w.css(e, "position")) {
            e = e.parentNode;
          }

          e && e !== r && 1 === e.nodeType && ((i = w(e).offset()).top += w.css(e, "borderTopWidth", !0), i.left += w.css(e, "borderLeftWidth", !0));
        }
        return {
          top: t.top - i.top - w.css(r, "marginTop", !0),
          left: t.left - i.left - w.css(r, "marginLeft", !0)
        };
      }
    },
    offsetParent: function offsetParent() {
      return this.map(function () {
        var e = this.offsetParent;

        while (e && "static" === w.css(e, "position")) {
          e = e.offsetParent;
        }

        return e || be;
      });
    }
  }), w.each({
    scrollLeft: "pageXOffset",
    scrollTop: "pageYOffset"
  }, function (e, t) {
    var n = "pageYOffset" === t;

    w.fn[e] = function (r) {
      return z(this, function (e, r, i) {
        var o;
        if (y(e) ? o = e : 9 === e.nodeType && (o = e.defaultView), void 0 === i) return o ? o[t] : e[r];
        o ? o.scrollTo(n ? o.pageXOffset : i, n ? i : o.pageYOffset) : e[r] = i;
      }, e, r, arguments.length);
    };
  }), w.each(["top", "left"], function (e, t) {
    w.cssHooks[t] = _e(h.pixelPosition, function (e, n) {
      if (n) return n = Fe(e, t), We.test(n) ? w(e).position()[t] + "px" : n;
    });
  }), w.each({
    Height: "height",
    Width: "width"
  }, function (e, t) {
    w.each({
      padding: "inner" + e,
      content: t,
      "": "outer" + e
    }, function (n, r) {
      w.fn[r] = function (i, o) {
        var a = arguments.length && (n || "boolean" != typeof i),
            s = n || (!0 === i || !0 === o ? "margin" : "border");
        return z(this, function (t, n, i) {
          var o;
          return y(t) ? 0 === r.indexOf("outer") ? t["inner" + e] : t.document.documentElement["client" + e] : 9 === t.nodeType ? (o = t.documentElement, Math.max(t.body["scroll" + e], o["scroll" + e], t.body["offset" + e], o["offset" + e], o["client" + e])) : void 0 === i ? w.css(t, n, s) : w.style(t, n, i, s);
        }, t, a ? i : void 0, a);
      };
    });
  }), w.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (e, t) {
    w.fn[t] = function (e, n) {
      return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t);
    };
  }), w.fn.extend({
    hover: function hover(e, t) {
      return this.mouseenter(e).mouseleave(t || e);
    }
  }), w.fn.extend({
    bind: function bind(e, t, n) {
      return this.on(e, null, t, n);
    },
    unbind: function unbind(e, t) {
      return this.off(e, null, t);
    },
    delegate: function delegate(e, t, n, r) {
      return this.on(t, e, n, r);
    },
    undelegate: function undelegate(e, t, n) {
      return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n);
    }
  }), w.proxy = function (e, t) {
    var n, r, i;
    if ("string" == typeof t && (n = e[t], t = e, e = n), g(e)) return r = o.call(arguments, 2), i = function i() {
      return e.apply(t || this, r.concat(o.call(arguments)));
    }, i.guid = e.guid = e.guid || w.guid++, i;
  }, w.holdReady = function (e) {
    e ? w.readyWait++ : w.ready(!0);
  }, w.isArray = Array.isArray, w.parseJSON = JSON.parse, w.nodeName = N, w.isFunction = g, w.isWindow = y, w.camelCase = G, w.type = x, w.now = Date.now, w.isNumeric = function (e) {
    var t = w.type(e);
    return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e));
  }, "function" == typeof define && define.amd && define("jquery", [], function () {
    return w;
  });
  var Jt = e.jQuery,
      Kt = e.$;
  return w.noConflict = function (t) {
    return e.$ === w && (e.$ = Kt), t && e.jQuery === w && (e.jQuery = Jt), w;
  }, t || (e.jQuery = e.$ = w), w;
});
/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */

(function (b, c) {
  var $ = b.jQuery || b.Cowboy || (b.Cowboy = {}),
      a;

  $.throttle = a = function a(e, f, j, i) {
    var h,
        d = 0;

    if (typeof f !== "boolean") {
      i = j;
      j = f;
      f = c;
    }

    function g() {
      var o = this,
          m = +new Date() - d,
          n = arguments;

      function l() {
        d = +new Date();
        j.apply(o, n);
      }

      function k() {
        h = c;
      }

      if (i && !h) {
        l();
      }

      h && clearTimeout(h);

      if (i === c && m > e) {
        l();
      } else {
        if (f !== true) {
          h = setTimeout(i ? k : l, i === c ? e - m : e);
        }
      }
    }

    if ($.guid) {
      g.guid = j.guid = j.guid || $.guid++;
    }

    return g;
  };

  $.debounce = function (d, e, f) {
    return f === c ? a(d, e, false) : a(d, f, e !== false);
  };
})(this);
/********************************************
	-	THEMEPUNCH TOOLS Ver. 1.0     -
	 Last Update of Tools 17.11.2014
*********************************************/

/*
* @fileOverview TouchSwipe - jQuery Plugin
* @version 1.6.6
*
* @author Matt Bryson http://www.github.com/mattbryson
* @see https://github.com/mattbryson/TouchSwipe-Jquery-Plugin
* @see http://labs.skinkers.com/touchSwipe/
* @see http://plugins.jquery.com/project/touchSwipe
*
* Copyright (c) 2010 Matt Bryson
* Dual licensed under the MIT or GPL Version 2 licenses.
*
*/


(function (a) {
  if (typeof define === "function" && define.amd && define.amd.jQuery) {
    define(["jquery"], a);
  } else {
    a(jQuery);
  }
})(function (f) {
  var p = "left",
      o = "right",
      e = "up",
      x = "down",
      c = "in",
      z = "out",
      m = "none",
      s = "auto",
      l = "swipe",
      t = "pinch",
      A = "tap",
      j = "doubletap",
      b = "longtap",
      y = "hold",
      D = "horizontal",
      u = "vertical",
      i = "all",
      r = 10,
      g = "start",
      k = "move",
      h = "end",
      q = "cancel",
      a = "ontouchstart" in window,
      v = window.navigator.msPointerEnabled && !window.navigator.pointerEnabled,
      d = window.navigator.pointerEnabled || window.navigator.msPointerEnabled,
      B = "TouchSwipe";
  var n = {
    fingers: 1,
    threshold: 75,
    cancelThreshold: null,
    pinchThreshold: 20,
    maxTimeThreshold: null,
    fingerReleaseThreshold: 250,
    longTapThreshold: 500,
    doubleTapThreshold: 200,
    swipe: null,
    swipeLeft: null,
    swipeRight: null,
    swipeUp: null,
    swipeDown: null,
    swipeStatus: null,
    pinchIn: null,
    pinchOut: null,
    pinchStatus: null,
    click: null,
    tap: null,
    doubleTap: null,
    longTap: null,
    hold: null,
    triggerOnTouchEnd: true,
    triggerOnTouchLeave: false,
    allowPageScroll: "auto",
    fallbackToMouseEvents: true,
    excludedElements: "label, button, input, select, textarea, a, .noSwipe"
  };

  f.fn.swipe = function (G) {
    var F = f(this),
        E = F.data(B);

    if (E && typeof G === "string") {
      if (E[G]) {
        return E[G].apply(this, Array.prototype.slice.call(arguments, 1));
      } else {
        f.error("Method " + G + " does not exist on jQuery.swipe");
      }
    } else {
      if (!E && (_typeof(G) === "object" || !G)) {
        return w.apply(this, arguments);
      }
    }

    return F;
  };

  f.fn.swipe.defaults = n;
  f.fn.swipe.phases = {
    PHASE_START: g,
    PHASE_MOVE: k,
    PHASE_END: h,
    PHASE_CANCEL: q
  };
  f.fn.swipe.directions = {
    LEFT: p,
    RIGHT: o,
    UP: e,
    DOWN: x,
    IN: c,
    OUT: z
  };
  f.fn.swipe.pageScroll = {
    NONE: m,
    HORIZONTAL: D,
    VERTICAL: u,
    AUTO: s
  };
  f.fn.swipe.fingers = {
    ONE: 1,
    TWO: 2,
    THREE: 3,
    ALL: i
  };

  function w(E) {
    if (E && E.allowPageScroll === undefined && (E.swipe !== undefined || E.swipeStatus !== undefined)) {
      E.allowPageScroll = m;
    }

    if (E.click !== undefined && E.tap === undefined) {
      E.tap = E.click;
    }

    if (!E) {
      E = {};
    }

    E = f.extend({}, f.fn.swipe.defaults, E);
    return this.each(function () {
      var G = f(this);
      var F = G.data(B);

      if (!F) {
        F = new C(this, E);
        G.data(B, F);
      }
    });
  }

  function C(a4, av) {
    var az = a || d || !av.fallbackToMouseEvents,
        J = az ? d ? v ? "MSPointerDown" : "pointerdown" : "touchstart" : "mousedown",
        ay = az ? d ? v ? "MSPointerMove" : "pointermove" : "touchmove" : "mousemove",
        U = az ? d ? v ? "MSPointerUp" : "pointerup" : "touchend" : "mouseup",
        S = az ? null : "mouseleave",
        aD = d ? v ? "MSPointerCancel" : "pointercancel" : "touchcancel";
    var ag = 0,
        aP = null,
        ab = 0,
        a1 = 0,
        aZ = 0,
        G = 1,
        aq = 0,
        aJ = 0,
        M = null;
    var aR = f(a4);
    var Z = "start";
    var W = 0;
    var aQ = null;
    var T = 0,
        a2 = 0,
        a5 = 0,
        ad = 0,
        N = 0;
    var aW = null,
        af = null;

    try {
      aR.bind(J, aN);
      aR.bind(aD, a9);
    } catch (ak) {
      f.error("events not supported " + J + "," + aD + " on jQuery.swipe");
    }

    this.enable = function () {
      aR.bind(J, aN);
      aR.bind(aD, a9);
      return aR;
    };

    this.disable = function () {
      aK();
      return aR;
    };

    this.destroy = function () {
      aK();
      aR.data(B, null);
      return aR;
    };

    this.option = function (bc, bb) {
      if (av[bc] !== undefined) {
        if (bb === undefined) {
          return av[bc];
        } else {
          av[bc] = bb;
        }
      } else {
        f.error("Option " + bc + " does not exist on jQuery.swipe.options");
      }

      return null;
    };

    function aN(bd) {
      if (aB()) {
        return;
      }

      if (f(bd.target).closest(av.excludedElements, aR).length > 0) {
        return;
      }

      var be = bd.originalEvent ? bd.originalEvent : bd;
      var bc,
          bb = a ? be.touches[0] : be;
      Z = g;

      if (a) {
        W = be.touches.length;
      } else {
        bd.preventDefault();
      }

      ag = 0;
      aP = null;
      aJ = null;
      ab = 0;
      a1 = 0;
      aZ = 0;
      G = 1;
      aq = 0;
      aQ = aj();
      M = aa();
      R();

      if (!a || W === av.fingers || av.fingers === i || aX()) {
        ai(0, bb);
        T = at();

        if (W == 2) {
          ai(1, be.touches[1]);
          a1 = aZ = au(aQ[0].start, aQ[1].start);
        }

        if (av.swipeStatus || av.pinchStatus) {
          bc = O(be, Z);
        }
      } else {
        bc = false;
      }

      if (bc === false) {
        Z = q;
        O(be, Z);
        return bc;
      } else {
        if (av.hold) {
          af = setTimeout(f.proxy(function () {
            aR.trigger("hold", [be.target]);

            if (av.hold) {
              bc = av.hold.call(aR, be, be.target);
            }
          }, this), av.longTapThreshold);
        }

        ao(true);
      }

      return null;
    }

    function a3(be) {
      var bh = be.originalEvent ? be.originalEvent : be;

      if (Z === h || Z === q || am()) {
        return;
      }

      var bd,
          bc = a ? bh.touches[0] : bh;
      var bf = aH(bc);
      a2 = at();

      if (a) {
        W = bh.touches.length;
      }

      if (av.hold) {
        clearTimeout(af);
      }

      Z = k;

      if (W == 2) {
        if (a1 == 0) {
          ai(1, bh.touches[1]);
          a1 = aZ = au(aQ[0].start, aQ[1].start);
        } else {
          aH(bh.touches[1]);
          aZ = au(aQ[0].end, aQ[1].end);
          aJ = ar(aQ[0].end, aQ[1].end);
        }

        G = a7(a1, aZ);
        aq = Math.abs(a1 - aZ);
      }

      if (W === av.fingers || av.fingers === i || !a || aX()) {
        aP = aL(bf.start, bf.end);
        al(be, aP);
        ag = aS(bf.start, bf.end);
        ab = aM();
        aI(aP, ag);

        if (av.swipeStatus || av.pinchStatus) {
          bd = O(bh, Z);
        }

        if (!av.triggerOnTouchEnd || av.triggerOnTouchLeave) {
          var bb = true;

          if (av.triggerOnTouchLeave) {
            var bg = aY(this);
            bb = E(bf.end, bg);
          }

          if (!av.triggerOnTouchEnd && bb) {
            Z = aC(k);
          } else {
            if (av.triggerOnTouchLeave && !bb) {
              Z = aC(h);
            }
          }

          if (Z == q || Z == h) {
            O(bh, Z);
          }
        }
      } else {
        Z = q;
        O(bh, Z);
      }

      if (bd === false) {
        Z = q;
        O(bh, Z);
      }
    }

    function L(bb) {
      var bc = bb.originalEvent;

      if (a) {
        if (bc.touches.length > 0) {
          F();
          return true;
        }
      }

      if (am()) {
        W = ad;
      }

      a2 = at();
      ab = aM();

      if (ba() || !an()) {
        Z = q;
        O(bc, Z);
      } else {
        if (av.triggerOnTouchEnd || av.triggerOnTouchEnd == false && Z === k) {
          bb.preventDefault();
          Z = h;
          O(bc, Z);
        } else {
          if (!av.triggerOnTouchEnd && a6()) {
            Z = h;
            aF(bc, Z, A);
          } else {
            if (Z === k) {
              Z = q;
              O(bc, Z);
            }
          }
        }
      }

      ao(false);
      return null;
    }

    function a9() {
      W = 0;
      a2 = 0;
      T = 0;
      a1 = 0;
      aZ = 0;
      G = 1;
      R();
      ao(false);
    }

    function K(bb) {
      var bc = bb.originalEvent;

      if (av.triggerOnTouchLeave) {
        Z = aC(h);
        O(bc, Z);
      }
    }

    function aK() {
      aR.unbind(J, aN);
      aR.unbind(aD, a9);
      aR.unbind(ay, a3);
      aR.unbind(U, L);

      if (S) {
        aR.unbind(S, K);
      }

      ao(false);
    }

    function aC(bf) {
      var be = bf;
      var bd = aA();
      var bc = an();
      var bb = ba();

      if (!bd || bb) {
        be = q;
      } else {
        if (bc && bf == k && (!av.triggerOnTouchEnd || av.triggerOnTouchLeave)) {
          be = h;
        } else {
          if (!bc && bf == h && av.triggerOnTouchLeave) {
            be = q;
          }
        }
      }

      return be;
    }

    function O(bd, bb) {
      var bc = undefined;

      if (I() || V()) {
        bc = aF(bd, bb, l);
      } else {
        if ((P() || aX()) && bc !== false) {
          bc = aF(bd, bb, t);
        }
      }

      if (aG() && bc !== false) {
        bc = aF(bd, bb, j);
      } else {
        if (ap() && bc !== false) {
          bc = aF(bd, bb, b);
        } else {
          if (ah() && bc !== false) {
            bc = aF(bd, bb, A);
          }
        }
      }

      if (bb === q) {
        a9(bd);
      }

      if (bb === h) {
        if (a) {
          if (bd.touches.length == 0) {
            a9(bd);
          }
        } else {
          a9(bd);
        }
      }

      return bc;
    }

    function aF(be, bb, bd) {
      var bc = undefined;

      if (bd == l) {
        aR.trigger("swipeStatus", [bb, aP || null, ag || 0, ab || 0, W, aQ]);

        if (av.swipeStatus) {
          bc = av.swipeStatus.call(aR, be, bb, aP || null, ag || 0, ab || 0, W, aQ);

          if (bc === false) {
            return false;
          }
        }

        if (bb == h && aV()) {
          aR.trigger("swipe", [aP, ag, ab, W, aQ]);

          if (av.swipe) {
            bc = av.swipe.call(aR, be, aP, ag, ab, W, aQ);

            if (bc === false) {
              return false;
            }
          }

          switch (aP) {
            case p:
              aR.trigger("swipeLeft", [aP, ag, ab, W, aQ]);

              if (av.swipeLeft) {
                bc = av.swipeLeft.call(aR, be, aP, ag, ab, W, aQ);
              }

              break;

            case o:
              aR.trigger("swipeRight", [aP, ag, ab, W, aQ]);

              if (av.swipeRight) {
                bc = av.swipeRight.call(aR, be, aP, ag, ab, W, aQ);
              }

              break;

            case e:
              aR.trigger("swipeUp", [aP, ag, ab, W, aQ]);

              if (av.swipeUp) {
                bc = av.swipeUp.call(aR, be, aP, ag, ab, W, aQ);
              }

              break;

            case x:
              aR.trigger("swipeDown", [aP, ag, ab, W, aQ]);

              if (av.swipeDown) {
                bc = av.swipeDown.call(aR, be, aP, ag, ab, W, aQ);
              }

              break;
          }
        }
      }

      if (bd == t) {
        aR.trigger("pinchStatus", [bb, aJ || null, aq || 0, ab || 0, W, G, aQ]);

        if (av.pinchStatus) {
          bc = av.pinchStatus.call(aR, be, bb, aJ || null, aq || 0, ab || 0, W, G, aQ);

          if (bc === false) {
            return false;
          }
        }

        if (bb == h && a8()) {
          switch (aJ) {
            case c:
              aR.trigger("pinchIn", [aJ || null, aq || 0, ab || 0, W, G, aQ]);

              if (av.pinchIn) {
                bc = av.pinchIn.call(aR, be, aJ || null, aq || 0, ab || 0, W, G, aQ);
              }

              break;

            case z:
              aR.trigger("pinchOut", [aJ || null, aq || 0, ab || 0, W, G, aQ]);

              if (av.pinchOut) {
                bc = av.pinchOut.call(aR, be, aJ || null, aq || 0, ab || 0, W, G, aQ);
              }

              break;
          }
        }
      }

      if (bd == A) {
        if (bb === q || bb === h) {
          clearTimeout(aW);
          clearTimeout(af);

          if (Y() && !H()) {
            N = at();
            aW = setTimeout(f.proxy(function () {
              N = null;
              aR.trigger("tap", [be.target]);

              if (av.tap) {
                bc = av.tap.call(aR, be, be.target);
              }
            }, this), av.doubleTapThreshold);
          } else {
            N = null;
            aR.trigger("tap", [be.target]);

            if (av.tap) {
              bc = av.tap.call(aR, be, be.target);
            }
          }
        }
      } else {
        if (bd == j) {
          if (bb === q || bb === h) {
            clearTimeout(aW);
            N = null;
            aR.trigger("doubletap", [be.target]);

            if (av.doubleTap) {
              bc = av.doubleTap.call(aR, be, be.target);
            }
          }
        } else {
          if (bd == b) {
            if (bb === q || bb === h) {
              clearTimeout(aW);
              N = null;
              aR.trigger("longtap", [be.target]);

              if (av.longTap) {
                bc = av.longTap.call(aR, be, be.target);
              }
            }
          }
        }
      }

      return bc;
    }

    function an() {
      var bb = true;

      if (av.threshold !== null) {
        bb = ag >= av.threshold;
      }

      return bb;
    }

    function ba() {
      var bb = false;

      if (av.cancelThreshold !== null && aP !== null) {
        bb = aT(aP) - ag >= av.cancelThreshold;
      }

      return bb;
    }

    function ae() {
      if (av.pinchThreshold !== null) {
        return aq >= av.pinchThreshold;
      }

      return true;
    }

    function aA() {
      var bb;

      if (av.maxTimeThreshold) {
        if (ab >= av.maxTimeThreshold) {
          bb = false;
        } else {
          bb = true;
        }
      } else {
        bb = true;
      }

      return bb;
    }

    function al(bb, bc) {
      if (av.allowPageScroll === m || aX()) {
        bb.preventDefault();
      } else {
        var bd = av.allowPageScroll === s;

        switch (bc) {
          case p:
            if (av.swipeLeft && bd || !bd && av.allowPageScroll != D) {
              bb.preventDefault();
            }

            break;

          case o:
            if (av.swipeRight && bd || !bd && av.allowPageScroll != D) {
              bb.preventDefault();
            }

            break;

          case e:
            if (av.swipeUp && bd || !bd && av.allowPageScroll != u) {
              bb.preventDefault();
            }

            break;

          case x:
            if (av.swipeDown && bd || !bd && av.allowPageScroll != u) {
              bb.preventDefault();
            }

            break;
        }
      }
    }

    function a8() {
      var bc = aO();
      var bb = X();
      var bd = ae();
      return bc && bb && bd;
    }

    function aX() {
      return !!(av.pinchStatus || av.pinchIn || av.pinchOut);
    }

    function P() {
      return !!(a8() && aX());
    }

    function aV() {
      var be = aA();
      var bg = an();
      var bd = aO();
      var bb = X();
      var bc = ba();
      var bf = !bc && bb && bd && bg && be;
      return bf;
    }

    function V() {
      return !!(av.swipe || av.swipeStatus || av.swipeLeft || av.swipeRight || av.swipeUp || av.swipeDown);
    }

    function I() {
      return !!(aV() && V());
    }

    function aO() {
      return W === av.fingers || av.fingers === i || !a;
    }

    function X() {
      return aQ[0].end.x !== 0;
    }

    function a6() {
      return !!av.tap;
    }

    function Y() {
      return !!av.doubleTap;
    }

    function aU() {
      return !!av.longTap;
    }

    function Q() {
      if (N == null) {
        return false;
      }

      var bb = at();
      return Y() && bb - N <= av.doubleTapThreshold;
    }

    function H() {
      return Q();
    }

    function ax() {
      return (W === 1 || !a) && (isNaN(ag) || ag < av.threshold);
    }

    function a0() {
      return ab > av.longTapThreshold && ag < r;
    }

    function ah() {
      return !!(ax() && a6());
    }

    function aG() {
      return !!(Q() && Y());
    }

    function ap() {
      return !!(a0() && aU());
    }

    function F() {
      a5 = at();
      ad = event.touches.length + 1;
    }

    function R() {
      a5 = 0;
      ad = 0;
    }

    function am() {
      var bb = false;

      if (a5) {
        var bc = at() - a5;

        if (bc <= av.fingerReleaseThreshold) {
          bb = true;
        }
      }

      return bb;
    }

    function aB() {
      return !!(aR.data(B + "_intouch") === true);
    }

    function ao(bb) {
      if (bb === true) {
        aR.bind(ay, a3);
        aR.bind(U, L);

        if (S) {
          aR.bind(S, K);
        }
      } else {
        aR.unbind(ay, a3, false);
        aR.unbind(U, L, false);

        if (S) {
          aR.unbind(S, K, false);
        }
      }

      aR.data(B + "_intouch", bb === true);
    }

    function ai(bc, bb) {
      var bd = bb.identifier !== undefined ? bb.identifier : 0;
      aQ[bc].identifier = bd;
      aQ[bc].start.x = aQ[bc].end.x = bb.pageX || bb.clientX;
      aQ[bc].start.y = aQ[bc].end.y = bb.pageY || bb.clientY;
      return aQ[bc];
    }

    function aH(bb) {
      var bd = bb.identifier !== undefined ? bb.identifier : 0;
      var bc = ac(bd);
      bc.end.x = bb.pageX || bb.clientX;
      bc.end.y = bb.pageY || bb.clientY;
      return bc;
    }

    function ac(bc) {
      for (var bb = 0; bb < aQ.length; bb++) {
        if (aQ[bb].identifier == bc) {
          return aQ[bb];
        }
      }
    }

    function aj() {
      var bb = [];

      for (var bc = 0; bc <= 5; bc++) {
        bb.push({
          start: {
            x: 0,
            y: 0
          },
          end: {
            x: 0,
            y: 0
          },
          identifier: 0
        });
      }

      return bb;
    }

    function aI(bb, bc) {
      bc = Math.max(bc, aT(bb));
      M[bb].distance = bc;
    }

    function aT(bb) {
      if (M[bb]) {
        return M[bb].distance;
      }

      return undefined;
    }

    function aa() {
      var bb = {};
      bb[p] = aw(p);
      bb[o] = aw(o);
      bb[e] = aw(e);
      bb[x] = aw(x);
      return bb;
    }

    function aw(bb) {
      return {
        direction: bb,
        distance: 0
      };
    }

    function aM() {
      return a2 - T;
    }

    function au(be, bd) {
      var bc = Math.abs(be.x - bd.x);
      var bb = Math.abs(be.y - bd.y);
      return Math.round(Math.sqrt(bc * bc + bb * bb));
    }

    function a7(bb, bc) {
      var bd = bc / bb * 1;
      return bd.toFixed(2);
    }

    function ar() {
      if (G < 1) {
        return z;
      } else {
        return c;
      }
    }

    function aS(bc, bb) {
      return Math.round(Math.sqrt(Math.pow(bb.x - bc.x, 2) + Math.pow(bb.y - bc.y, 2)));
    }

    function aE(be, bc) {
      var bb = be.x - bc.x;
      var bg = bc.y - be.y;
      var bd = Math.atan2(bg, bb);
      var bf = Math.round(bd * 180 / Math.PI);

      if (bf < 0) {
        bf = 360 - Math.abs(bf);
      }

      return bf;
    }

    function aL(bc, bb) {
      var bd = aE(bc, bb);

      if (bd <= 45 && bd >= 0) {
        return p;
      } else {
        if (bd <= 360 && bd >= 315) {
          return p;
        } else {
          if (bd >= 135 && bd <= 225) {
            return o;
          } else {
            if (bd > 45 && bd < 135) {
              return x;
            } else {
              return e;
            }
          }
        }
      }
    }

    function at() {
      var bb = new Date();
      return bb.getTime();
    }

    function aY(bb) {
      bb = f(bb);
      var bd = bb.offset();
      var bc = {
        left: bd.left,
        right: bd.left + bb.outerWidth(),
        top: bd.top,
        bottom: bd.top + bb.outerHeight()
      };
      return bc;
    }

    function E(bb, bc) {
      return bb.x > bc.left && bb.x < bc.right && bb.y > bc.top && bb.y < bc.bottom;
    }
  }
});

if (typeof console === 'undefined') {
  var console = {};

  console.log = console.error = console.info = console.debug = console.warn = console.trace = console.dir = console.dirxml = console.group = console.groupEnd = console.time = console.timeEnd = console.assert = console.profile = console.groupCollapsed = function () {};
}

if (window.tplogs == true) try {
  console.groupCollapsed("ThemePunch GreenSocks Logs");
} catch (e) {}
var oldgs = window.GreenSockGlobals;
oldgs_queue = window._gsQueue;
var punchgs = window.GreenSockGlobals = {};
if (window.tplogs == true) try {
  console.info("Build GreenSock SandBox for ThemePunch Plugins");
  console.info("GreenSock TweenLite Engine Initalised by ThemePunch Plugin");
} catch (e) {}
/*!
 * VERSION: 1.14.2
 * DATE: 2014-10-28
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */

(function (t, e) {
  "use strict";

  var i = t.GreenSockGlobals = t.GreenSockGlobals || t;

  if (!i.TweenLite) {
    var s,
        r,
        n,
        a,
        o,
        l = function l(t) {
      var e,
          s = t.split("."),
          r = i;

      for (e = 0; s.length > e; e++) {
        r[s[e]] = r = r[s[e]] || {};
      }

      return r;
    },
        h = l("com.greensock"),
        _ = 1e-10,
        u = function u(t) {
      var e,
          i = [],
          s = t.length;

      for (e = 0; e !== s; i.push(t[e++])) {
        ;
      }

      return i;
    },
        m = function m() {},
        f = function () {
      var t = Object.prototype.toString,
          e = t.call([]);
      return function (i) {
        return null != i && (i instanceof Array || "object" == _typeof(i) && !!i.push && t.call(i) === e);
      };
    }(),
        c = {},
        p = function p(s, r, n, a) {
      this.sc = c[s] ? c[s].sc : [], c[s] = this, this.gsClass = null, this.func = n;
      var o = [];
      this.check = function (h) {
        for (var _, u, m, f, d = r.length, v = d; --d > -1;) {
          (_ = c[r[d]] || new p(r[d], [])).gsClass ? (o[d] = _.gsClass, v--) : h && _.sc.push(this);
        }

        if (0 === v && n) for (u = ("com.greensock." + s).split("."), m = u.pop(), f = l(u.join("."))[m] = this.gsClass = n.apply(n, o), a && (i[m] = f, "function" == typeof define && define.amd ? define((t.GreenSockAMDPath ? t.GreenSockAMDPath + "/" : "") + s.split(".").pop(), [], function () {
          return f;
        }) : s === e && "undefined" != typeof module && module.exports && (module.exports = f)), d = 0; this.sc.length > d; d++) {
          this.sc[d].check();
        }
      }, this.check(!0);
    },
        d = t._gsDefine = function (t, e, i, s) {
      return new p(t, e, i, s);
    },
        v = h._class = function (t, e, i) {
      return e = e || function () {}, d(t, [], function () {
        return e;
      }, i), e;
    };

    d.globals = i;

    var g = [0, 0, 1, 1],
        T = [],
        y = v("easing.Ease", function (t, e, i, s) {
      this._func = t, this._type = i || 0, this._power = s || 0, this._params = e ? g.concat(e) : g;
    }, !0),
        w = y.map = {},
        P = y.register = function (t, e, i, s) {
      for (var r, n, a, o, l = e.split(","), _ = l.length, u = (i || "easeIn,easeOut,easeInOut").split(","); --_ > -1;) {
        for (n = l[_], r = s ? v("easing." + n, null, !0) : h.easing[n] || {}, a = u.length; --a > -1;) {
          o = u[a], w[n + "." + o] = w[o + n] = r[o] = t.getRatio ? t : t[o] || new t();
        }
      }
    };

    for (n = y.prototype, n._calcEnd = !1, n.getRatio = function (t) {
      if (this._func) return this._params[0] = t, this._func.apply(null, this._params);
      var e = this._type,
          i = this._power,
          s = 1 === e ? 1 - t : 2 === e ? t : .5 > t ? 2 * t : 2 * (1 - t);
      return 1 === i ? s *= s : 2 === i ? s *= s * s : 3 === i ? s *= s * s * s : 4 === i && (s *= s * s * s * s), 1 === e ? 1 - s : 2 === e ? s : .5 > t ? s / 2 : 1 - s / 2;
    }, s = ["Linear", "Quad", "Cubic", "Quart", "Quint,Strong"], r = s.length; --r > -1;) {
      n = s[r] + ",Power" + r, P(new y(null, null, 1, r), n, "easeOut", !0), P(new y(null, null, 2, r), n, "easeIn" + (0 === r ? ",easeNone" : "")), P(new y(null, null, 3, r), n, "easeInOut");
    }

    w.linear = h.easing.Linear.easeIn, w.swing = h.easing.Quad.easeInOut;
    var b = v("events.EventDispatcher", function (t) {
      this._listeners = {}, this._eventTarget = t || this;
    });
    n = b.prototype, n.addEventListener = function (t, e, i, s, r) {
      r = r || 0;
      var n,
          l,
          h = this._listeners[t],
          _ = 0;

      for (null == h && (this._listeners[t] = h = []), l = h.length; --l > -1;) {
        n = h[l], n.c === e && n.s === i ? h.splice(l, 1) : 0 === _ && r > n.pr && (_ = l + 1);
      }

      h.splice(_, 0, {
        c: e,
        s: i,
        up: s,
        pr: r
      }), this !== a || o || a.wake();
    }, n.removeEventListener = function (t, e) {
      var i,
          s = this._listeners[t];
      if (s) for (i = s.length; --i > -1;) {
        if (s[i].c === e) return s.splice(i, 1), void 0;
      }
    }, n.dispatchEvent = function (t) {
      var e,
          i,
          s,
          r = this._listeners[t];
      if (r) for (e = r.length, i = this._eventTarget; --e > -1;) {
        s = r[e], s && (s.up ? s.c.call(s.s || i, {
          type: t,
          target: i
        }) : s.c.call(s.s || i));
      }
    };

    var k = t.requestAnimationFrame,
        A = t.cancelAnimationFrame,
        S = Date.now || function () {
      return new Date().getTime();
    },
        x = S();

    for (s = ["ms", "moz", "webkit", "o"], r = s.length; --r > -1 && !k;) {
      k = t[s[r] + "RequestAnimationFrame"], A = t[s[r] + "CancelAnimationFrame"] || t[s[r] + "CancelRequestAnimationFrame"];
    }

    v("Ticker", function (t, e) {
      var i,
          s,
          r,
          n,
          l,
          h = this,
          u = S(),
          f = e !== !1 && k,
          c = 500,
          p = 33,
          d = function d(t) {
        var e,
            a,
            o = S() - x;
        o > c && (u += o - p), x += o, h.time = (x - u) / 1e3, e = h.time - l, (!i || e > 0 || t === !0) && (h.frame++, l += e + (e >= n ? .004 : n - e), a = !0), t !== !0 && (r = s(d)), a && h.dispatchEvent("tick");
      };

      b.call(h), h.time = h.frame = 0, h.tick = function () {
        d(!0);
      }, h.lagSmoothing = function (t, e) {
        c = t || 1 / _, p = Math.min(e, c, 0);
      }, h.sleep = function () {
        null != r && (f && A ? A(r) : clearTimeout(r), s = m, r = null, h === a && (o = !1));
      }, h.wake = function () {
        null !== r ? h.sleep() : h.frame > 10 && (x = S() - c + 5), s = 0 === i ? m : f && k ? k : function (t) {
          return setTimeout(t, 0 | 1e3 * (l - h.time) + 1);
        }, h === a && (o = !0), d(2);
      }, h.fps = function (t) {
        return arguments.length ? (i = t, n = 1 / (i || 60), l = this.time + n, h.wake(), void 0) : i;
      }, h.useRAF = function (t) {
        return arguments.length ? (h.sleep(), f = t, h.fps(i), void 0) : f;
      }, h.fps(t), setTimeout(function () {
        f && (!r || 5 > h.frame) && h.useRAF(!1);
      }, 1500);
    }), n = h.Ticker.prototype = new h.events.EventDispatcher(), n.constructor = h.Ticker;
    var R = v("core.Animation", function (t, e) {
      if (this.vars = e = e || {}, this._duration = this._totalDuration = t || 0, this._delay = Number(e.delay) || 0, this._timeScale = 1, this._active = e.immediateRender === !0, this.data = e.data, this._reversed = e.reversed === !0, B) {
        o || a.wake();
        var i = this.vars.useFrames ? q : B;
        i.add(this, i._time), this.vars.paused && this.paused(!0);
      }
    });
    a = R.ticker = new h.Ticker(), n = R.prototype, n._dirty = n._gc = n._initted = n._paused = !1, n._totalTime = n._time = 0, n._rawPrevTime = -1, n._next = n._last = n._onUpdate = n._timeline = n.timeline = null, n._paused = !1;

    var C = function C() {
      o && S() - x > 2e3 && a.wake(), setTimeout(C, 2e3);
    };

    C(), n.play = function (t, e) {
      return null != t && this.seek(t, e), this.reversed(!1).paused(!1);
    }, n.pause = function (t, e) {
      return null != t && this.seek(t, e), this.paused(!0);
    }, n.resume = function (t, e) {
      return null != t && this.seek(t, e), this.paused(!1);
    }, n.seek = function (t, e) {
      return this.totalTime(Number(t), e !== !1);
    }, n.restart = function (t, e) {
      return this.reversed(!1).paused(!1).totalTime(t ? -this._delay : 0, e !== !1, !0);
    }, n.reverse = function (t, e) {
      return null != t && this.seek(t || this.totalDuration(), e), this.reversed(!0).paused(!1);
    }, n.render = function () {}, n.invalidate = function () {
      return this._time = this._totalTime = 0, this._initted = this._gc = !1, this._rawPrevTime = -1, (this._gc || !this.timeline) && this._enabled(!0), this;
    }, n.isActive = function () {
      var t,
          e = this._timeline,
          i = this._startTime;
      return !e || !this._gc && !this._paused && e.isActive() && (t = e.rawTime()) >= i && i + this.totalDuration() / this._timeScale > t;
    }, n._enabled = function (t, e) {
      return o || a.wake(), this._gc = !t, this._active = this.isActive(), e !== !0 && (t && !this.timeline ? this._timeline.add(this, this._startTime - this._delay) : !t && this.timeline && this._timeline._remove(this, !0)), !1;
    }, n._kill = function () {
      return this._enabled(!1, !1);
    }, n.kill = function (t, e) {
      return this._kill(t, e), this;
    }, n._uncache = function (t) {
      for (var e = t ? this : this.timeline; e;) {
        e._dirty = !0, e = e.timeline;
      }

      return this;
    }, n._swapSelfInParams = function (t) {
      for (var e = t.length, i = t.concat(); --e > -1;) {
        "{self}" === t[e] && (i[e] = this);
      }

      return i;
    }, n.eventCallback = function (t, e, i, s) {
      if ("on" === (t || "").substr(0, 2)) {
        var r = this.vars;
        if (1 === arguments.length) return r[t];
        null == e ? delete r[t] : (r[t] = e, r[t + "Params"] = f(i) && -1 !== i.join("").indexOf("{self}") ? this._swapSelfInParams(i) : i, r[t + "Scope"] = s), "onUpdate" === t && (this._onUpdate = e);
      }

      return this;
    }, n.delay = function (t) {
      return arguments.length ? (this._timeline.smoothChildTiming && this.startTime(this._startTime + t - this._delay), this._delay = t, this) : this._delay;
    }, n.duration = function (t) {
      return arguments.length ? (this._duration = this._totalDuration = t, this._uncache(!0), this._timeline.smoothChildTiming && this._time > 0 && this._time < this._duration && 0 !== t && this.totalTime(this._totalTime * (t / this._duration), !0), this) : (this._dirty = !1, this._duration);
    }, n.totalDuration = function (t) {
      return this._dirty = !1, arguments.length ? this.duration(t) : this._totalDuration;
    }, n.time = function (t, e) {
      return arguments.length ? (this._dirty && this.totalDuration(), this.totalTime(t > this._duration ? this._duration : t, e)) : this._time;
    }, n.totalTime = function (t, e, i) {
      if (o || a.wake(), !arguments.length) return this._totalTime;

      if (this._timeline) {
        if (0 > t && !i && (t += this.totalDuration()), this._timeline.smoothChildTiming) {
          this._dirty && this.totalDuration();
          var s = this._totalDuration,
              r = this._timeline;
          if (t > s && !i && (t = s), this._startTime = (this._paused ? this._pauseTime : r._time) - (this._reversed ? s - t : t) / this._timeScale, r._dirty || this._uncache(!1), r._timeline) for (; r._timeline;) {
            r._timeline._time !== (r._startTime + r._totalTime) / r._timeScale && r.totalTime(r._totalTime, !0), r = r._timeline;
          }
        }

        this._gc && this._enabled(!0, !1), (this._totalTime !== t || 0 === this._duration) && (this.render(t, e, !1), z.length && M());
      }

      return this;
    }, n.progress = n.totalProgress = function (t, e) {
      return arguments.length ? this.totalTime(this.duration() * t, e) : this._time / this.duration();
    }, n.startTime = function (t) {
      return arguments.length ? (t !== this._startTime && (this._startTime = t, this.timeline && this.timeline._sortChildren && this.timeline.add(this, t - this._delay)), this) : this._startTime;
    }, n.endTime = function (t) {
      return this._startTime + (0 != t ? this.totalDuration() : this.duration()) / this._timeScale;
    }, n.timeScale = function (t) {
      if (!arguments.length) return this._timeScale;

      if (t = t || _, this._timeline && this._timeline.smoothChildTiming) {
        var e = this._pauseTime,
            i = e || 0 === e ? e : this._timeline.totalTime();
        this._startTime = i - (i - this._startTime) * this._timeScale / t;
      }

      return this._timeScale = t, this._uncache(!1);
    }, n.reversed = function (t) {
      return arguments.length ? (t != this._reversed && (this._reversed = t, this.totalTime(this._timeline && !this._timeline.smoothChildTiming ? this.totalDuration() - this._totalTime : this._totalTime, !0)), this) : this._reversed;
    }, n.paused = function (t) {
      if (!arguments.length) return this._paused;

      if (t != this._paused && this._timeline) {
        o || t || a.wake();
        var e = this._timeline,
            i = e.rawTime(),
            s = i - this._pauseTime;
        !t && e.smoothChildTiming && (this._startTime += s, this._uncache(!1)), this._pauseTime = t ? i : null, this._paused = t, this._active = this.isActive(), !t && 0 !== s && this._initted && this.duration() && this.render(e.smoothChildTiming ? this._totalTime : (i - this._startTime) / this._timeScale, !0, !0);
      }

      return this._gc && !t && this._enabled(!0, !1), this;
    };
    var D = v("core.SimpleTimeline", function (t) {
      R.call(this, 0, t), this.autoRemoveChildren = this.smoothChildTiming = !0;
    });
    n = D.prototype = new R(), n.constructor = D, n.kill()._gc = !1, n._first = n._last = n._recent = null, n._sortChildren = !1, n.add = n.insert = function (t, e) {
      var i, s;
      if (t._startTime = Number(e || 0) + t._delay, t._paused && this !== t._timeline && (t._pauseTime = t._startTime + (this.rawTime() - t._startTime) / t._timeScale), t.timeline && t.timeline._remove(t, !0), t.timeline = t._timeline = this, t._gc && t._enabled(!0, !0), i = this._last, this._sortChildren) for (s = t._startTime; i && i._startTime > s;) {
        i = i._prev;
      }
      return i ? (t._next = i._next, i._next = t) : (t._next = this._first, this._first = t), t._next ? t._next._prev = t : this._last = t, t._prev = i, this._recent = t, this._timeline && this._uncache(!0), this;
    }, n._remove = function (t, e) {
      return t.timeline === this && (e || t._enabled(!1, !0), t._prev ? t._prev._next = t._next : this._first === t && (this._first = t._next), t._next ? t._next._prev = t._prev : this._last === t && (this._last = t._prev), t._next = t._prev = t.timeline = null, t === this._recent && (this._recent = this._last), this._timeline && this._uncache(!0)), this;
    }, n.render = function (t, e, i) {
      var s,
          r = this._first;

      for (this._totalTime = this._time = this._rawPrevTime = t; r;) {
        s = r._next, (r._active || t >= r._startTime && !r._paused) && (r._reversed ? r.render((r._dirty ? r.totalDuration() : r._totalDuration) - (t - r._startTime) * r._timeScale, e, i) : r.render((t - r._startTime) * r._timeScale, e, i)), r = s;
      }
    }, n.rawTime = function () {
      return o || a.wake(), this._totalTime;
    };

    var I = v("TweenLite", function (e, i, s) {
      if (R.call(this, i, s), this.render = I.prototype.render, null == e) throw "Cannot tween a null target.";
      this.target = e = "string" != typeof e ? e : I.selector(e) || e;
      var r,
          n,
          a,
          o = e.jquery || e.length && e !== t && e[0] && (e[0] === t || e[0].nodeType && e[0].style && !e.nodeType),
          l = this.vars.overwrite;
      if (this._overwrite = l = null == l ? Q[I.defaultOverwrite] : "number" == typeof l ? l >> 0 : Q[l], (o || e instanceof Array || e.push && f(e)) && "number" != typeof e[0]) for (this._targets = a = u(e), this._propLookup = [], this._siblings = [], r = 0; a.length > r; r++) {
        n = a[r], n ? "string" != typeof n ? n.length && n !== t && n[0] && (n[0] === t || n[0].nodeType && n[0].style && !n.nodeType) ? (a.splice(r--, 1), this._targets = a = a.concat(u(n))) : (this._siblings[r] = $(n, this, !1), 1 === l && this._siblings[r].length > 1 && H(n, this, null, 1, this._siblings[r])) : (n = a[r--] = I.selector(n), "string" == typeof n && a.splice(r + 1, 1)) : a.splice(r--, 1);
      } else this._propLookup = {}, this._siblings = $(e, this, !1), 1 === l && this._siblings.length > 1 && H(e, this, null, 1, this._siblings);
      (this.vars.immediateRender || 0 === i && 0 === this._delay && this.vars.immediateRender !== !1) && (this._time = -_, this.render(-this._delay));
    }, !0),
        E = function E(e) {
      return e && e.length && e !== t && e[0] && (e[0] === t || e[0].nodeType && e[0].style && !e.nodeType);
    },
        O = function O(t, e) {
      var i,
          s = {};

      for (i in t) {
        G[i] || i in e && "transform" !== i && "x" !== i && "y" !== i && "width" !== i && "height" !== i && "className" !== i && "border" !== i || !(!U[i] || U[i] && U[i]._autoCSS) || (s[i] = t[i], delete t[i]);
      }

      t.css = s;
    };

    n = I.prototype = new R(), n.constructor = I, n.kill()._gc = !1, n.ratio = 0, n._firstPT = n._targets = n._overwrittenProps = n._startAt = null, n._notifyPluginsOfEnabled = n._lazy = !1, I.version = "1.14.2", I.defaultEase = n._ease = new y(null, null, 1, 1), I.defaultOverwrite = "auto", I.ticker = a, I.autoSleep = !0, I.lagSmoothing = function (t, e) {
      a.lagSmoothing(t, e);
    }, I.selector = t.$ || t.jQuery || function (e) {
      var i = t.$ || t.jQuery;
      return i ? (I.selector = i, i(e)) : "undefined" == typeof document ? e : document.querySelectorAll ? document.querySelectorAll(e) : document.getElementById("#" === e.charAt(0) ? e.substr(1) : e);
    };

    var z = [],
        L = {},
        N = I._internals = {
      isArray: f,
      isSelector: E,
      lazyTweens: z
    },
        U = I._plugins = {},
        F = N.tweenLookup = {},
        j = 0,
        G = N.reservedProps = {
      ease: 1,
      delay: 1,
      overwrite: 1,
      onComplete: 1,
      onCompleteParams: 1,
      onCompleteScope: 1,
      useFrames: 1,
      runBackwards: 1,
      startAt: 1,
      onUpdate: 1,
      onUpdateParams: 1,
      onUpdateScope: 1,
      onStart: 1,
      onStartParams: 1,
      onStartScope: 1,
      onReverseComplete: 1,
      onReverseCompleteParams: 1,
      onReverseCompleteScope: 1,
      onRepeat: 1,
      onRepeatParams: 1,
      onRepeatScope: 1,
      easeParams: 1,
      yoyo: 1,
      immediateRender: 1,
      repeat: 1,
      repeatDelay: 1,
      data: 1,
      paused: 1,
      reversed: 1,
      autoCSS: 1,
      lazy: 1,
      onOverwrite: 1
    },
        Q = {
      none: 0,
      all: 1,
      auto: 2,
      concurrent: 3,
      allOnStart: 4,
      preexisting: 5,
      "true": 1,
      "false": 0
    },
        q = R._rootFramesTimeline = new D(),
        B = R._rootTimeline = new D(),
        M = N.lazyRender = function () {
      var t,
          e = z.length;

      for (L = {}; --e > -1;) {
        t = z[e], t && t._lazy !== !1 && (t.render(t._lazy[0], t._lazy[1], !0), t._lazy = !1);
      }

      z.length = 0;
    };

    B._startTime = a.time, q._startTime = a.frame, B._active = q._active = !0, setTimeout(M, 1), R._updateRoot = I.render = function () {
      var t, e, i;

      if (z.length && M(), B.render((a.time - B._startTime) * B._timeScale, !1, !1), q.render((a.frame - q._startTime) * q._timeScale, !1, !1), z.length && M(), !(a.frame % 120)) {
        for (i in F) {
          for (e = F[i].tweens, t = e.length; --t > -1;) {
            e[t]._gc && e.splice(t, 1);
          }

          0 === e.length && delete F[i];
        }

        if (i = B._first, (!i || i._paused) && I.autoSleep && !q._first && 1 === a._listeners.tick.length) {
          for (; i && i._paused;) {
            i = i._next;
          }

          i || a.sleep();
        }
      }
    }, a.addEventListener("tick", R._updateRoot);

    var $ = function $(t, e, i) {
      var s,
          r,
          n = t._gsTweenID;
      if (F[n || (t._gsTweenID = n = "t" + j++)] || (F[n] = {
        target: t,
        tweens: []
      }), e && (s = F[n].tweens, s[r = s.length] = e, i)) for (; --r > -1;) {
        s[r] === e && s.splice(r, 1);
      }
      return F[n].tweens;
    },
        K = function K(t, e, i, s) {
      var r,
          n,
          a = t.vars.onOverwrite;
      return a && (r = a(t, e, i, s)), a = I.onOverwrite, a && (n = a(t, e, i, s)), r !== !1 && n !== !1;
    },
        H = function H(t, e, i, s, r) {
      var n, a, o, l;

      if (1 === s || s >= 4) {
        for (l = r.length, n = 0; l > n; n++) {
          if ((o = r[n]) !== e) o._gc || K(o, e) && o._enabled(!1, !1) && (a = !0);else if (5 === s) break;
        }

        return a;
      }

      var h,
          u = e._startTime + _,
          m = [],
          f = 0,
          c = 0 === e._duration;

      for (n = r.length; --n > -1;) {
        (o = r[n]) === e || o._gc || o._paused || (o._timeline !== e._timeline ? (h = h || J(e, 0, c), 0 === J(o, h, c) && (m[f++] = o)) : u >= o._startTime && o._startTime + o.totalDuration() / o._timeScale > u && ((c || !o._initted) && 2e-10 >= u - o._startTime || (m[f++] = o)));
      }

      for (n = f; --n > -1;) {
        if (o = m[n], 2 === s && o._kill(i, t, e) && (a = !0), 2 !== s || !o._firstPT && o._initted) {
          if (2 !== s && !K(o, e)) continue;
          o._enabled(!1, !1) && (a = !0);
        }
      }

      return a;
    },
        J = function J(t, e, i) {
      for (var s = t._timeline, r = s._timeScale, n = t._startTime; s._timeline;) {
        if (n += s._startTime, r *= s._timeScale, s._paused) return -100;
        s = s._timeline;
      }

      return n /= r, n > e ? n - e : i && n === e || !t._initted && 2 * _ > n - e ? _ : (n += t.totalDuration() / t._timeScale / r) > e + _ ? 0 : n - e - _;
    };

    n._init = function () {
      var t,
          e,
          i,
          s,
          r,
          n = this.vars,
          a = this._overwrittenProps,
          o = this._duration,
          l = !!n.immediateRender,
          h = n.ease;

      if (n.startAt) {
        this._startAt && (this._startAt.render(-1, !0), this._startAt.kill()), r = {};

        for (s in n.startAt) {
          r[s] = n.startAt[s];
        }

        if (r.overwrite = !1, r.immediateRender = !0, r.lazy = l && n.lazy !== !1, r.startAt = r.delay = null, this._startAt = I.to(this.target, 0, r), l) if (this._time > 0) this._startAt = null;else if (0 !== o) return;
      } else if (n.runBackwards && 0 !== o) if (this._startAt) this._startAt.render(-1, !0), this._startAt.kill(), this._startAt = null;else {
        0 !== this._time && (l = !1), i = {};

        for (s in n) {
          G[s] && "autoCSS" !== s || (i[s] = n[s]);
        }

        if (i.overwrite = 0, i.data = "isFromStart", i.lazy = l && n.lazy !== !1, i.immediateRender = l, this._startAt = I.to(this.target, 0, i), l) {
          if (0 === this._time) return;
        } else this._startAt._init(), this._startAt._enabled(!1), this.vars.immediateRender && (this._startAt = null);
      }

      if (this._ease = h = h ? h instanceof y ? h : "function" == typeof h ? new y(h, n.easeParams) : w[h] || I.defaultEase : I.defaultEase, n.easeParams instanceof Array && h.config && (this._ease = h.config.apply(h, n.easeParams)), this._easeType = this._ease._type, this._easePower = this._ease._power, this._firstPT = null, this._targets) for (t = this._targets.length; --t > -1;) {
        this._initProps(this._targets[t], this._propLookup[t] = {}, this._siblings[t], a ? a[t] : null) && (e = !0);
      } else e = this._initProps(this.target, this._propLookup, this._siblings, a);
      if (e && I._onPluginEvent("_onInitAllProps", this), a && (this._firstPT || "function" != typeof this.target && this._enabled(!1, !1)), n.runBackwards) for (i = this._firstPT; i;) {
        i.s += i.c, i.c = -i.c, i = i._next;
      }
      this._onUpdate = n.onUpdate, this._initted = !0;
    }, n._initProps = function (e, i, s, r) {
      var n, a, o, l, h, _;

      if (null == e) return !1;
      L[e._gsTweenID] && M(), this.vars.css || e.style && e !== t && e.nodeType && U.css && this.vars.autoCSS !== !1 && O(this.vars, e);

      for (n in this.vars) {
        if (_ = this.vars[n], G[n]) _ && (_ instanceof Array || _.push && f(_)) && -1 !== _.join("").indexOf("{self}") && (this.vars[n] = _ = this._swapSelfInParams(_, this));else if (U[n] && (l = new U[n]())._onInitTween(e, this.vars[n], this)) {
          for (this._firstPT = h = {
            _next: this._firstPT,
            t: l,
            p: "setRatio",
            s: 0,
            c: 1,
            f: !0,
            n: n,
            pg: !0,
            pr: l._priority
          }, a = l._overwriteProps.length; --a > -1;) {
            i[l._overwriteProps[a]] = this._firstPT;
          }

          (l._priority || l._onInitAllProps) && (o = !0), (l._onDisable || l._onEnable) && (this._notifyPluginsOfEnabled = !0);
        } else this._firstPT = i[n] = h = {
          _next: this._firstPT,
          t: e,
          p: n,
          f: "function" == typeof e[n],
          n: n,
          pg: !1,
          pr: 0
        }, h.s = h.f ? e[n.indexOf("set") || "function" != typeof e["get" + n.substr(3)] ? n : "get" + n.substr(3)]() : parseFloat(e[n]), h.c = "string" == typeof _ && "=" === _.charAt(1) ? parseInt(_.charAt(0) + "1", 10) * Number(_.substr(2)) : Number(_) - h.s || 0;
        h && h._next && (h._next._prev = h);
      }

      return r && this._kill(r, e) ? this._initProps(e, i, s, r) : this._overwrite > 1 && this._firstPT && s.length > 1 && H(e, this, i, this._overwrite, s) ? (this._kill(i, e), this._initProps(e, i, s, r)) : (this._firstPT && (this.vars.lazy !== !1 && this._duration || this.vars.lazy && !this._duration) && (L[e._gsTweenID] = !0), o);
    }, n.render = function (t, e, i) {
      var s,
          r,
          n,
          a,
          o = this._time,
          l = this._duration,
          h = this._rawPrevTime;
      if (t >= l) this._totalTime = this._time = l, this.ratio = this._ease._calcEnd ? this._ease.getRatio(1) : 1, this._reversed || (s = !0, r = "onComplete"), 0 === l && (this._initted || !this.vars.lazy || i) && (this._startTime === this._timeline._duration && (t = 0), (0 === t || 0 > h || h === _) && h !== t && (i = !0, h > _ && (r = "onReverseComplete")), this._rawPrevTime = a = !e || t || h === t ? t : _);else if (1e-7 > t) this._totalTime = this._time = 0, this.ratio = this._ease._calcEnd ? this._ease.getRatio(0) : 0, (0 !== o || 0 === l && h > 0 && h !== _) && (r = "onReverseComplete", s = this._reversed), 0 > t && (this._active = !1, 0 === l && (this._initted || !this.vars.lazy || i) && (h >= 0 && (i = !0), this._rawPrevTime = a = !e || t || h === t ? t : _)), this._initted || (i = !0);else if (this._totalTime = this._time = t, this._easeType) {
        var u = t / l,
            m = this._easeType,
            f = this._easePower;
        (1 === m || 3 === m && u >= .5) && (u = 1 - u), 3 === m && (u *= 2), 1 === f ? u *= u : 2 === f ? u *= u * u : 3 === f ? u *= u * u * u : 4 === f && (u *= u * u * u * u), this.ratio = 1 === m ? 1 - u : 2 === m ? u : .5 > t / l ? u / 2 : 1 - u / 2;
      } else this.ratio = this._ease.getRatio(t / l);

      if (this._time !== o || i) {
        if (!this._initted) {
          if (this._init(), !this._initted || this._gc) return;
          if (!i && this._firstPT && (this.vars.lazy !== !1 && this._duration || this.vars.lazy && !this._duration)) return this._time = this._totalTime = o, this._rawPrevTime = h, z.push(this), this._lazy = [t, e], void 0;
          this._time && !s ? this.ratio = this._ease.getRatio(this._time / l) : s && this._ease._calcEnd && (this.ratio = this._ease.getRatio(0 === this._time ? 0 : 1));
        }

        for (this._lazy !== !1 && (this._lazy = !1), this._active || !this._paused && this._time !== o && t >= 0 && (this._active = !0), 0 === o && (this._startAt && (t >= 0 ? this._startAt.render(t, e, i) : r || (r = "_dummyGS")), this.vars.onStart && (0 !== this._time || 0 === l) && (e || this.vars.onStart.apply(this.vars.onStartScope || this, this.vars.onStartParams || T))), n = this._firstPT; n;) {
          n.f ? n.t[n.p](n.c * this.ratio + n.s) : n.t[n.p] = n.c * this.ratio + n.s, n = n._next;
        }

        this._onUpdate && (0 > t && this._startAt && t !== -1e-4 && this._startAt.render(t, e, i), e || (this._time !== o || s) && this._onUpdate.apply(this.vars.onUpdateScope || this, this.vars.onUpdateParams || T)), r && (!this._gc || i) && (0 > t && this._startAt && !this._onUpdate && t !== -1e-4 && this._startAt.render(t, e, i), s && (this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !e && this.vars[r] && this.vars[r].apply(this.vars[r + "Scope"] || this, this.vars[r + "Params"] || T), 0 === l && this._rawPrevTime === _ && a !== _ && (this._rawPrevTime = 0));
      }
    }, n._kill = function (t, e, i) {
      if ("all" === t && (t = null), null == t && (null == e || e === this.target)) return this._lazy = !1, this._enabled(!1, !1);
      e = "string" != typeof e ? e || this._targets || this.target : I.selector(e) || e;

      var s, r, n, a, o, l, h, _, u;

      if ((f(e) || E(e)) && "number" != typeof e[0]) for (s = e.length; --s > -1;) {
        this._kill(t, e[s]) && (l = !0);
      } else {
        if (this._targets) {
          for (s = this._targets.length; --s > -1;) {
            if (e === this._targets[s]) {
              o = this._propLookup[s] || {}, this._overwrittenProps = this._overwrittenProps || [], r = this._overwrittenProps[s] = t ? this._overwrittenProps[s] || {} : "all";
              break;
            }
          }
        } else {
          if (e !== this.target) return !1;
          o = this._propLookup, r = this._overwrittenProps = t ? this._overwrittenProps || {} : "all";
        }

        if (o) {
          if (h = t || o, _ = t !== r && "all" !== r && t !== o && ("object" != _typeof(t) || !t._tempKill), i && (I.onOverwrite || this.vars.onOverwrite)) {
            for (n in h) {
              o[n] && (u || (u = []), u.push(n));
            }

            if (!K(this, i, e, u)) return !1;
          }

          for (n in h) {
            (a = o[n]) && (a.pg && a.t._kill(h) && (l = !0), a.pg && 0 !== a.t._overwriteProps.length || (a._prev ? a._prev._next = a._next : a === this._firstPT && (this._firstPT = a._next), a._next && (a._next._prev = a._prev), a._next = a._prev = null), delete o[n]), _ && (r[n] = 1);
          }

          !this._firstPT && this._initted && this._enabled(!1, !1);
        }
      }
      return l;
    }, n.invalidate = function () {
      return this._notifyPluginsOfEnabled && I._onPluginEvent("_onDisable", this), this._firstPT = this._overwrittenProps = this._startAt = this._onUpdate = null, this._notifyPluginsOfEnabled = this._active = this._lazy = !1, this._propLookup = this._targets ? {} : [], R.prototype.invalidate.call(this), this.vars.immediateRender && (this._time = -_, this.render(-this._delay)), this;
    }, n._enabled = function (t, e) {
      if (o || a.wake(), t && this._gc) {
        var i,
            s = this._targets;
        if (s) for (i = s.length; --i > -1;) {
          this._siblings[i] = $(s[i], this, !0);
        } else this._siblings = $(this.target, this, !0);
      }

      return R.prototype._enabled.call(this, t, e), this._notifyPluginsOfEnabled && this._firstPT ? I._onPluginEvent(t ? "_onEnable" : "_onDisable", this) : !1;
    }, I.to = function (t, e, i) {
      return new I(t, e, i);
    }, I.from = function (t, e, i) {
      return i.runBackwards = !0, i.immediateRender = 0 != i.immediateRender, new I(t, e, i);
    }, I.fromTo = function (t, e, i, s) {
      return s.startAt = i, s.immediateRender = 0 != s.immediateRender && 0 != i.immediateRender, new I(t, e, s);
    }, I.delayedCall = function (t, e, i, s, r) {
      return new I(e, 0, {
        delay: t,
        onComplete: e,
        onCompleteParams: i,
        onCompleteScope: s,
        onReverseComplete: e,
        onReverseCompleteParams: i,
        onReverseCompleteScope: s,
        immediateRender: !1,
        useFrames: r,
        overwrite: 0
      });
    }, I.set = function (t, e) {
      return new I(t, 0, e);
    }, I.getTweensOf = function (t, e) {
      if (null == t) return [];
      t = "string" != typeof t ? t : I.selector(t) || t;
      var i, s, r, n;

      if ((f(t) || E(t)) && "number" != typeof t[0]) {
        for (i = t.length, s = []; --i > -1;) {
          s = s.concat(I.getTweensOf(t[i], e));
        }

        for (i = s.length; --i > -1;) {
          for (n = s[i], r = i; --r > -1;) {
            n === s[r] && s.splice(i, 1);
          }
        }
      } else for (s = $(t).concat(), i = s.length; --i > -1;) {
        (s[i]._gc || e && !s[i].isActive()) && s.splice(i, 1);
      }

      return s;
    }, I.killTweensOf = I.killDelayedCallsTo = function (t, e, i) {
      "object" == _typeof(e) && (i = e, e = !1);

      for (var s = I.getTweensOf(t, e), r = s.length; --r > -1;) {
        s[r]._kill(i, t);
      }
    };
    var V = v("plugins.TweenPlugin", function (t, e) {
      this._overwriteProps = (t || "").split(","), this._propName = this._overwriteProps[0], this._priority = e || 0, this._super = V.prototype;
    }, !0);

    if (n = V.prototype, V.version = "1.10.1", V.API = 2, n._firstPT = null, n._addTween = function (t, e, i, s, r, n) {
      var a, o;
      return null != s && (a = "number" == typeof s || "=" !== s.charAt(1) ? Number(s) - i : parseInt(s.charAt(0) + "1", 10) * Number(s.substr(2))) ? (this._firstPT = o = {
        _next: this._firstPT,
        t: t,
        p: e,
        s: i,
        c: a,
        f: "function" == typeof t[e],
        n: r || e,
        r: n
      }, o._next && (o._next._prev = o), o) : void 0;
    }, n.setRatio = function (t) {
      for (var e, i = this._firstPT, s = 1e-6; i;) {
        e = i.c * t + i.s, i.r ? e = Math.round(e) : s > e && e > -s && (e = 0), i.f ? i.t[i.p](e) : i.t[i.p] = e, i = i._next;
      }
    }, n._kill = function (t) {
      var e,
          i = this._overwriteProps,
          s = this._firstPT;
      if (null != t[this._propName]) this._overwriteProps = [];else for (e = i.length; --e > -1;) {
        null != t[i[e]] && i.splice(e, 1);
      }

      for (; s;) {
        null != t[s.n] && (s._next && (s._next._prev = s._prev), s._prev ? (s._prev._next = s._next, s._prev = null) : this._firstPT === s && (this._firstPT = s._next)), s = s._next;
      }

      return !1;
    }, n._roundProps = function (t, e) {
      for (var i = this._firstPT; i;) {
        (t[this._propName] || null != i.n && t[i.n.split(this._propName + "_").join("")]) && (i.r = e), i = i._next;
      }
    }, I._onPluginEvent = function (t, e) {
      var i,
          s,
          r,
          n,
          a,
          o = e._firstPT;

      if ("_onInitAllProps" === t) {
        for (; o;) {
          for (a = o._next, s = r; s && s.pr > o.pr;) {
            s = s._next;
          }

          (o._prev = s ? s._prev : n) ? o._prev._next = o : r = o, (o._next = s) ? s._prev = o : n = o, o = a;
        }

        o = e._firstPT = r;
      }

      for (; o;) {
        o.pg && "function" == typeof o.t[t] && o.t[t]() && (i = !0), o = o._next;
      }

      return i;
    }, V.activate = function (t) {
      for (var e = t.length; --e > -1;) {
        t[e].API === V.API && (U[new t[e]()._propName] = t[e]);
      }

      return !0;
    }, d.plugin = function (t) {
      if (!(t && t.propName && t.init && t.API)) throw "illegal plugin definition.";
      var e,
          i = t.propName,
          s = t.priority || 0,
          r = t.overwriteProps,
          n = {
        init: "_onInitTween",
        set: "setRatio",
        kill: "_kill",
        round: "_roundProps",
        initAll: "_onInitAllProps"
      },
          a = v("plugins." + i.charAt(0).toUpperCase() + i.substr(1) + "Plugin", function () {
        V.call(this, i, s), this._overwriteProps = r || [];
      }, t.global === !0),
          o = a.prototype = new V(i);
      o.constructor = a, a.API = t.API;

      for (e in n) {
        "function" == typeof t[e] && (o[n[e]] = t[e]);
      }

      return a.version = t.version, V.activate([a]), a;
    }, s = t._gsQueue) {
      for (r = 0; s.length > r; r++) {
        s[r]();
      }

      for (n in c) {
        c[n].func || t.console.log("GSAP encountered missing dependency: com.greensock." + n);
      }
    }

    o = !1;
  }
})("undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window, "TweenLite");
/*!
 * VERSION: 1.14.2
 * DATE: 2014-10-18
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */


var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;

(_gsScope._gsQueue || (_gsScope._gsQueue = [])).push(function () {
  "use strict";

  _gsScope._gsDefine("TimelineLite", ["core.Animation", "core.SimpleTimeline", "TweenLite"], function (t, e, i) {
    var s = function s(t) {
      e.call(this, t), this._labels = {}, this.autoRemoveChildren = this.vars.autoRemoveChildren === !0, this.smoothChildTiming = this.vars.smoothChildTiming === !0, this._sortChildren = !0, this._onUpdate = this.vars.onUpdate;
      var i,
          s,
          r = this.vars;

      for (s in r) {
        i = r[s], o(i) && -1 !== i.join("").indexOf("{self}") && (r[s] = this._swapSelfInParams(i));
      }

      o(r.tweens) && this.add(r.tweens, 0, r.align, r.stagger);
    },
        r = 1e-10,
        n = i._internals,
        a = n.isSelector,
        o = n.isArray,
        h = n.lazyTweens,
        l = n.lazyRender,
        _ = [],
        u = _gsScope._gsDefine.globals,
        c = function c(t) {
      var e,
          i = {};

      for (e in t) {
        i[e] = t[e];
      }

      return i;
    },
        p = function p(t, e, i, s) {
      var r = t._timeline._totalTime;
      (e || !this._forcingPlayhead) && (t._timeline.pause(t._startTime), e && e.apply(s || t._timeline, i || _), this._forcingPlayhead && t._timeline.seek(r));
    },
        f = function f(t) {
      var e,
          i = [],
          s = t.length;

      for (e = 0; e !== s; i.push(t[e++])) {
        ;
      }

      return i;
    },
        m = s.prototype = new e();

    return s.version = "1.14.2", m.constructor = s, m.kill()._gc = m._forcingPlayhead = !1, m.to = function (t, e, s, r) {
      var n = s.repeat && u.TweenMax || i;
      return e ? this.add(new n(t, e, s), r) : this.set(t, s, r);
    }, m.from = function (t, e, s, r) {
      return this.add((s.repeat && u.TweenMax || i).from(t, e, s), r);
    }, m.fromTo = function (t, e, s, r, n) {
      var a = r.repeat && u.TweenMax || i;
      return e ? this.add(a.fromTo(t, e, s, r), n) : this.set(t, r, n);
    }, m.staggerTo = function (t, e, r, n, o, h, l, _) {
      var u,
          p = new s({
        onComplete: h,
        onCompleteParams: l,
        onCompleteScope: _,
        smoothChildTiming: this.smoothChildTiming
      });

      for ("string" == typeof t && (t = i.selector(t) || t), t = t || [], a(t) && (t = f(t)), n = n || 0, 0 > n && (t = f(t), t.reverse(), n *= -1), u = 0; t.length > u; u++) {
        r.startAt && (r.startAt = c(r.startAt)), p.to(t[u], e, c(r), u * n);
      }

      return this.add(p, o);
    }, m.staggerFrom = function (t, e, i, s, r, n, a, o) {
      return i.immediateRender = 0 != i.immediateRender, i.runBackwards = !0, this.staggerTo(t, e, i, s, r, n, a, o);
    }, m.staggerFromTo = function (t, e, i, s, r, n, a, o, h) {
      return s.startAt = i, s.immediateRender = 0 != s.immediateRender && 0 != i.immediateRender, this.staggerTo(t, e, s, r, n, a, o, h);
    }, m.call = function (t, e, s, r) {
      return this.add(i.delayedCall(0, t, e, s), r);
    }, m.set = function (t, e, s) {
      return s = this._parseTimeOrLabel(s, 0, !0), null == e.immediateRender && (e.immediateRender = s === this._time && !this._paused), this.add(new i(t, 0, e), s);
    }, s.exportRoot = function (t, e) {
      t = t || {}, null == t.smoothChildTiming && (t.smoothChildTiming = !0);
      var r,
          n,
          a = new s(t),
          o = a._timeline;

      for (null == e && (e = !0), o._remove(a, !0), a._startTime = 0, a._rawPrevTime = a._time = a._totalTime = o._time, r = o._first; r;) {
        n = r._next, e && r instanceof i && r.target === r.vars.onComplete || a.add(r, r._startTime - r._delay), r = n;
      }

      return o.add(a, 0), a;
    }, m.add = function (r, n, a, h) {
      var l, _, u, c, p, f;

      if ("number" != typeof n && (n = this._parseTimeOrLabel(n, 0, !0, r)), !(r instanceof t)) {
        if (r instanceof Array || r && r.push && o(r)) {
          for (a = a || "normal", h = h || 0, l = n, _ = r.length, u = 0; _ > u; u++) {
            o(c = r[u]) && (c = new s({
              tweens: c
            })), this.add(c, l), "string" != typeof c && "function" != typeof c && ("sequence" === a ? l = c._startTime + c.totalDuration() / c._timeScale : "start" === a && (c._startTime -= c.delay())), l += h;
          }

          return this._uncache(!0);
        }

        if ("string" == typeof r) return this.addLabel(r, n);
        if ("function" != typeof r) throw "Cannot add " + r + " into the timeline; it is not a tween, timeline, function, or string.";
        r = i.delayedCall(0, r);
      }

      if (e.prototype.add.call(this, r, n), (this._gc || this._time === this._duration) && !this._paused && this._duration < this.duration()) for (p = this, f = p.rawTime() > r._startTime; p._timeline;) {
        f && p._timeline.smoothChildTiming ? p.totalTime(p._totalTime, !0) : p._gc && p._enabled(!0, !1), p = p._timeline;
      }
      return this;
    }, m.remove = function (e) {
      if (e instanceof t) return this._remove(e, !1);

      if (e instanceof Array || e && e.push && o(e)) {
        for (var i = e.length; --i > -1;) {
          this.remove(e[i]);
        }

        return this;
      }

      return "string" == typeof e ? this.removeLabel(e) : this.kill(null, e);
    }, m._remove = function (t, i) {
      e.prototype._remove.call(this, t, i);

      var s = this._last;
      return s ? this._time > s._startTime + s._totalDuration / s._timeScale && (this._time = this.duration(), this._totalTime = this._totalDuration) : this._time = this._totalTime = this._duration = this._totalDuration = 0, this;
    }, m.append = function (t, e) {
      return this.add(t, this._parseTimeOrLabel(null, e, !0, t));
    }, m.insert = m.insertMultiple = function (t, e, i, s) {
      return this.add(t, e || 0, i, s);
    }, m.appendMultiple = function (t, e, i, s) {
      return this.add(t, this._parseTimeOrLabel(null, e, !0, t), i, s);
    }, m.addLabel = function (t, e) {
      return this._labels[t] = this._parseTimeOrLabel(e), this;
    }, m.addPause = function (t, e, i, s) {
      return this.call(p, ["{self}", e, i, s], this, t);
    }, m.removeLabel = function (t) {
      return delete this._labels[t], this;
    }, m.getLabelTime = function (t) {
      return null != this._labels[t] ? this._labels[t] : -1;
    }, m._parseTimeOrLabel = function (e, i, s, r) {
      var n;
      if (r instanceof t && r.timeline === this) this.remove(r);else if (r && (r instanceof Array || r.push && o(r))) for (n = r.length; --n > -1;) {
        r[n] instanceof t && r[n].timeline === this && this.remove(r[n]);
      }
      if ("string" == typeof i) return this._parseTimeOrLabel(i, s && "number" == typeof e && null == this._labels[i] ? e - this.duration() : 0, s);
      if (i = i || 0, "string" != typeof e || !isNaN(e) && null == this._labels[e]) null == e && (e = this.duration());else {
        if (n = e.indexOf("="), -1 === n) return null == this._labels[e] ? s ? this._labels[e] = this.duration() + i : i : this._labels[e] + i;
        i = parseInt(e.charAt(n - 1) + "1", 10) * Number(e.substr(n + 1)), e = n > 1 ? this._parseTimeOrLabel(e.substr(0, n - 1), 0, s) : this.duration();
      }
      return Number(e) + i;
    }, m.seek = function (t, e) {
      return this.totalTime("number" == typeof t ? t : this._parseTimeOrLabel(t), e !== !1);
    }, m.stop = function () {
      return this.paused(!0);
    }, m.gotoAndPlay = function (t, e) {
      return this.play(t, e);
    }, m.gotoAndStop = function (t, e) {
      return this.pause(t, e);
    }, m.render = function (t, e, i) {
      this._gc && this._enabled(!0, !1);
      var s,
          n,
          a,
          o,
          u,
          c = this._dirty ? this.totalDuration() : this._totalDuration,
          p = this._time,
          f = this._startTime,
          m = this._timeScale,
          d = this._paused;

      if (t >= c ? (this._totalTime = this._time = c, this._reversed || this._hasPausedChild() || (n = !0, o = "onComplete", 0 === this._duration && (0 === t || 0 > this._rawPrevTime || this._rawPrevTime === r) && this._rawPrevTime !== t && this._first && (u = !0, this._rawPrevTime > r && (o = "onReverseComplete"))), this._rawPrevTime = this._duration || !e || t || this._rawPrevTime === t ? t : r, t = c + 1e-4) : 1e-7 > t ? (this._totalTime = this._time = 0, (0 !== p || 0 === this._duration && this._rawPrevTime !== r && (this._rawPrevTime > 0 || 0 > t && this._rawPrevTime >= 0)) && (o = "onReverseComplete", n = this._reversed), 0 > t ? (this._active = !1, this._rawPrevTime >= 0 && this._first && (u = !0), this._rawPrevTime = t) : (this._rawPrevTime = this._duration || !e || t || this._rawPrevTime === t ? t : r, t = 0, this._initted || (u = !0))) : this._totalTime = this._time = this._rawPrevTime = t, this._time !== p && this._first || i || u) {
        if (this._initted || (this._initted = !0), this._active || !this._paused && this._time !== p && t > 0 && (this._active = !0), 0 === p && this.vars.onStart && 0 !== this._time && (e || this.vars.onStart.apply(this.vars.onStartScope || this, this.vars.onStartParams || _)), this._time >= p) for (s = this._first; s && (a = s._next, !this._paused || d);) {
          (s._active || s._startTime <= this._time && !s._paused && !s._gc) && (s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (t - s._startTime) * s._timeScale, e, i) : s.render((t - s._startTime) * s._timeScale, e, i)), s = a;
        } else for (s = this._last; s && (a = s._prev, !this._paused || d);) {
          (s._active || p >= s._startTime && !s._paused && !s._gc) && (s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (t - s._startTime) * s._timeScale, e, i) : s.render((t - s._startTime) * s._timeScale, e, i)), s = a;
        }
        this._onUpdate && (e || (h.length && l(), this._onUpdate.apply(this.vars.onUpdateScope || this, this.vars.onUpdateParams || _))), o && (this._gc || (f === this._startTime || m !== this._timeScale) && (0 === this._time || c >= this.totalDuration()) && (n && (h.length && l(), this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !e && this.vars[o] && this.vars[o].apply(this.vars[o + "Scope"] || this, this.vars[o + "Params"] || _)));
      }
    }, m._hasPausedChild = function () {
      for (var t = this._first; t;) {
        if (t._paused || t instanceof s && t._hasPausedChild()) return !0;
        t = t._next;
      }

      return !1;
    }, m.getChildren = function (t, e, s, r) {
      r = r || -9999999999;

      for (var n = [], a = this._first, o = 0; a;) {
        r > a._startTime || (a instanceof i ? e !== !1 && (n[o++] = a) : (s !== !1 && (n[o++] = a), t !== !1 && (n = n.concat(a.getChildren(!0, e, s)), o = n.length))), a = a._next;
      }

      return n;
    }, m.getTweensOf = function (t, e) {
      var s,
          r,
          n = this._gc,
          a = [],
          o = 0;

      for (n && this._enabled(!0, !0), s = i.getTweensOf(t), r = s.length; --r > -1;) {
        (s[r].timeline === this || e && this._contains(s[r])) && (a[o++] = s[r]);
      }

      return n && this._enabled(!1, !0), a;
    }, m.recent = function () {
      return this._recent;
    }, m._contains = function (t) {
      for (var e = t.timeline; e;) {
        if (e === this) return !0;
        e = e.timeline;
      }

      return !1;
    }, m.shiftChildren = function (t, e, i) {
      i = i || 0;

      for (var s, r = this._first, n = this._labels; r;) {
        r._startTime >= i && (r._startTime += t), r = r._next;
      }

      if (e) for (s in n) {
        n[s] >= i && (n[s] += t);
      }
      return this._uncache(!0);
    }, m._kill = function (t, e) {
      if (!t && !e) return this._enabled(!1, !1);

      for (var i = e ? this.getTweensOf(e) : this.getChildren(!0, !0, !1), s = i.length, r = !1; --s > -1;) {
        i[s]._kill(t, e) && (r = !0);
      }

      return r;
    }, m.clear = function (t) {
      var e = this.getChildren(!1, !0, !0),
          i = e.length;

      for (this._time = this._totalTime = 0; --i > -1;) {
        e[i]._enabled(!1, !1);
      }

      return t !== !1 && (this._labels = {}), this._uncache(!0);
    }, m.invalidate = function () {
      for (var e = this._first; e;) {
        e.invalidate(), e = e._next;
      }

      return t.prototype.invalidate.call(this);
    }, m._enabled = function (t, i) {
      if (t === this._gc) for (var s = this._first; s;) {
        s._enabled(t, !0), s = s._next;
      }
      return e.prototype._enabled.call(this, t, i);
    }, m.totalTime = function () {
      this._forcingPlayhead = !0;
      var e = t.prototype.totalTime.apply(this, arguments);
      return this._forcingPlayhead = !1, e;
    }, m.duration = function (t) {
      return arguments.length ? (0 !== this.duration() && 0 !== t && this.timeScale(this._duration / t), this) : (this._dirty && this.totalDuration(), this._duration);
    }, m.totalDuration = function (t) {
      if (!arguments.length) {
        if (this._dirty) {
          for (var e, i, s = 0, r = this._last, n = 999999999999; r;) {
            e = r._prev, r._dirty && r.totalDuration(), r._startTime > n && this._sortChildren && !r._paused ? this.add(r, r._startTime - r._delay) : n = r._startTime, 0 > r._startTime && !r._paused && (s -= r._startTime, this._timeline.smoothChildTiming && (this._startTime += r._startTime / this._timeScale), this.shiftChildren(-r._startTime, !1, -9999999999), n = 0), i = r._startTime + r._totalDuration / r._timeScale, i > s && (s = i), r = e;
          }

          this._duration = this._totalDuration = s, this._dirty = !1;
        }

        return this._totalDuration;
      }

      return 0 !== this.totalDuration() && 0 !== t && this.timeScale(this._totalDuration / t), this;
    }, m.usesFrames = function () {
      for (var e = this._timeline; e._timeline;) {
        e = e._timeline;
      }

      return e === t._rootFramesTimeline;
    }, m.rawTime = function () {
      return this._paused ? this._totalTime : (this._timeline.rawTime() - this._startTime) * this._timeScale;
    }, s;
  }, !0);
}), _gsScope._gsDefine && _gsScope._gsQueue.pop()(), function (t) {
  "use strict";

  var e = function e() {
    return (_gsScope.GreenSockGlobals || _gsScope)[t];
  };

  "function" == typeof define && define.amd ? define(["TweenLite"], e) : "undefined" != typeof module && module.exports && (require("./TweenLite.js"), module.exports = e());
}("TimelineLite");
/*!
 * VERSION: beta 1.9.4
 * DATE: 2014-07-17
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 **/

var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;

(_gsScope._gsQueue || (_gsScope._gsQueue = [])).push(function () {
  "use strict";

  _gsScope._gsDefine("easing.Back", ["easing.Ease"], function (t) {
    var e,
        i,
        s,
        r = _gsScope.GreenSockGlobals || _gsScope,
        n = r.com.greensock,
        a = 2 * Math.PI,
        o = Math.PI / 2,
        h = n._class,
        l = function l(e, i) {
      var s = h("easing." + e, function () {}, !0),
          r = s.prototype = new t();
      return r.constructor = s, r.getRatio = i, s;
    },
        _ = t.register || function () {},
        u = function u(t, e, i, s) {
      var r = h("easing." + t, {
        easeOut: new e(),
        easeIn: new i(),
        easeInOut: new s()
      }, !0);
      return _(r, t), r;
    },
        c = function c(t, e, i) {
      this.t = t, this.v = e, i && (this.next = i, i.prev = this, this.c = i.v - e, this.gap = i.t - t);
    },
        p = function p(e, i) {
      var s = h("easing." + e, function (t) {
        this._p1 = t || 0 === t ? t : 1.70158, this._p2 = 1.525 * this._p1;
      }, !0),
          r = s.prototype = new t();
      return r.constructor = s, r.getRatio = i, r.config = function (t) {
        return new s(t);
      }, s;
    },
        f = u("Back", p("BackOut", function (t) {
      return (t -= 1) * t * ((this._p1 + 1) * t + this._p1) + 1;
    }), p("BackIn", function (t) {
      return t * t * ((this._p1 + 1) * t - this._p1);
    }), p("BackInOut", function (t) {
      return 1 > (t *= 2) ? .5 * t * t * ((this._p2 + 1) * t - this._p2) : .5 * ((t -= 2) * t * ((this._p2 + 1) * t + this._p2) + 2);
    })),
        m = h("easing.SlowMo", function (t, e, i) {
      e = e || 0 === e ? e : .7, null == t ? t = .7 : t > 1 && (t = 1), this._p = 1 !== t ? e : 0, this._p1 = (1 - t) / 2, this._p2 = t, this._p3 = this._p1 + this._p2, this._calcEnd = i === !0;
    }, !0),
        d = m.prototype = new t();

    return d.constructor = m, d.getRatio = function (t) {
      var e = t + (.5 - t) * this._p;
      return this._p1 > t ? this._calcEnd ? 1 - (t = 1 - t / this._p1) * t : e - (t = 1 - t / this._p1) * t * t * t * e : t > this._p3 ? this._calcEnd ? 1 - (t = (t - this._p3) / this._p1) * t : e + (t - e) * (t = (t - this._p3) / this._p1) * t * t * t : this._calcEnd ? 1 : e;
    }, m.ease = new m(.7, .7), d.config = m.config = function (t, e, i) {
      return new m(t, e, i);
    }, e = h("easing.SteppedEase", function (t) {
      t = t || 1, this._p1 = 1 / t, this._p2 = t + 1;
    }, !0), d = e.prototype = new t(), d.constructor = e, d.getRatio = function (t) {
      return 0 > t ? t = 0 : t >= 1 && (t = .999999999), (this._p2 * t >> 0) * this._p1;
    }, d.config = e.config = function (t) {
      return new e(t);
    }, i = h("easing.RoughEase", function (e) {
      e = e || {};

      for (var i, s, r, n, a, o, h = e.taper || "none", l = [], _ = 0, u = 0 | (e.points || 20), p = u, f = e.randomize !== !1, m = e.clamp === !0, d = e.template instanceof t ? e.template : null, g = "number" == typeof e.strength ? .4 * e.strength : .4; --p > -1;) {
        i = f ? Math.random() : 1 / u * p, s = d ? d.getRatio(i) : i, "none" === h ? r = g : "out" === h ? (n = 1 - i, r = n * n * g) : "in" === h ? r = i * i * g : .5 > i ? (n = 2 * i, r = .5 * n * n * g) : (n = 2 * (1 - i), r = .5 * n * n * g), f ? s += Math.random() * r - .5 * r : p % 2 ? s += .5 * r : s -= .5 * r, m && (s > 1 ? s = 1 : 0 > s && (s = 0)), l[_++] = {
          x: i,
          y: s
        };
      }

      for (l.sort(function (t, e) {
        return t.x - e.x;
      }), o = new c(1, 1, null), p = u; --p > -1;) {
        a = l[p], o = new c(a.x, a.y, o);
      }

      this._prev = new c(0, 0, 0 !== o.t ? o : o.next);
    }, !0), d = i.prototype = new t(), d.constructor = i, d.getRatio = function (t) {
      var e = this._prev;

      if (t > e.t) {
        for (; e.next && t >= e.t;) {
          e = e.next;
        }

        e = e.prev;
      } else for (; e.prev && e.t >= t;) {
        e = e.prev;
      }

      return this._prev = e, e.v + (t - e.t) / e.gap * e.c;
    }, d.config = function (t) {
      return new i(t);
    }, i.ease = new i(), u("Bounce", l("BounceOut", function (t) {
      return 1 / 2.75 > t ? 7.5625 * t * t : 2 / 2.75 > t ? 7.5625 * (t -= 1.5 / 2.75) * t + .75 : 2.5 / 2.75 > t ? 7.5625 * (t -= 2.25 / 2.75) * t + .9375 : 7.5625 * (t -= 2.625 / 2.75) * t + .984375;
    }), l("BounceIn", function (t) {
      return 1 / 2.75 > (t = 1 - t) ? 1 - 7.5625 * t * t : 2 / 2.75 > t ? 1 - (7.5625 * (t -= 1.5 / 2.75) * t + .75) : 2.5 / 2.75 > t ? 1 - (7.5625 * (t -= 2.25 / 2.75) * t + .9375) : 1 - (7.5625 * (t -= 2.625 / 2.75) * t + .984375);
    }), l("BounceInOut", function (t) {
      var e = .5 > t;
      return t = e ? 1 - 2 * t : 2 * t - 1, t = 1 / 2.75 > t ? 7.5625 * t * t : 2 / 2.75 > t ? 7.5625 * (t -= 1.5 / 2.75) * t + .75 : 2.5 / 2.75 > t ? 7.5625 * (t -= 2.25 / 2.75) * t + .9375 : 7.5625 * (t -= 2.625 / 2.75) * t + .984375, e ? .5 * (1 - t) : .5 * t + .5;
    })), u("Circ", l("CircOut", function (t) {
      return Math.sqrt(1 - (t -= 1) * t);
    }), l("CircIn", function (t) {
      return -(Math.sqrt(1 - t * t) - 1);
    }), l("CircInOut", function (t) {
      return 1 > (t *= 2) ? -.5 * (Math.sqrt(1 - t * t) - 1) : .5 * (Math.sqrt(1 - (t -= 2) * t) + 1);
    })), s = function s(e, i, _s) {
      var r = h("easing." + e, function (t, e) {
        this._p1 = t || 1, this._p2 = e || _s, this._p3 = this._p2 / a * (Math.asin(1 / this._p1) || 0);
      }, !0),
          n = r.prototype = new t();
      return n.constructor = r, n.getRatio = i, n.config = function (t, e) {
        return new r(t, e);
      }, r;
    }, u("Elastic", s("ElasticOut", function (t) {
      return this._p1 * Math.pow(2, -10 * t) * Math.sin((t - this._p3) * a / this._p2) + 1;
    }, .3), s("ElasticIn", function (t) {
      return -(this._p1 * Math.pow(2, 10 * (t -= 1)) * Math.sin((t - this._p3) * a / this._p2));
    }, .3), s("ElasticInOut", function (t) {
      return 1 > (t *= 2) ? -.5 * this._p1 * Math.pow(2, 10 * (t -= 1)) * Math.sin((t - this._p3) * a / this._p2) : .5 * this._p1 * Math.pow(2, -10 * (t -= 1)) * Math.sin((t - this._p3) * a / this._p2) + 1;
    }, .45)), u("Expo", l("ExpoOut", function (t) {
      return 1 - Math.pow(2, -10 * t);
    }), l("ExpoIn", function (t) {
      return Math.pow(2, 10 * (t - 1)) - .001;
    }), l("ExpoInOut", function (t) {
      return 1 > (t *= 2) ? .5 * Math.pow(2, 10 * (t - 1)) : .5 * (2 - Math.pow(2, -10 * (t - 1)));
    })), u("Sine", l("SineOut", function (t) {
      return Math.sin(t * o);
    }), l("SineIn", function (t) {
      return -Math.cos(t * o) + 1;
    }), l("SineInOut", function (t) {
      return -.5 * (Math.cos(Math.PI * t) - 1);
    })), h("easing.EaseLookup", {
      find: function find(e) {
        return t.map[e];
      }
    }, !0), _(r.SlowMo, "SlowMo", "ease,"), _(i, "RoughEase", "ease,"), _(e, "SteppedEase", "ease,"), f;
  }, !0);
}), _gsScope._gsDefine && _gsScope._gsQueue.pop()();
/*!
 * VERSION: 1.14.2
 * DATE: 2014-10-28
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * This work is subject to the terms at http://www.greensock.com/terms_of_use.html or for
 * Club GreenSock members, the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */

var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;

(_gsScope._gsQueue || (_gsScope._gsQueue = [])).push(function () {
  "use strict";

  _gsScope._gsDefine("plugins.CSSPlugin", ["plugins.TweenPlugin", "TweenLite"], function (t, e) {
    var i,
        r,
        s,
        n,
        a = function a() {
      t.call(this, "css"), this._overwriteProps.length = 0, this.setRatio = a.prototype.setRatio;
    },
        o = {},
        l = a.prototype = new t("css");

    l.constructor = a, a.version = "1.14.2", a.API = 2, a.defaultTransformPerspective = 0, a.defaultSkewType = "compensated", l = "px", a.suffixMap = {
      top: l,
      right: l,
      bottom: l,
      left: l,
      width: l,
      height: l,
      fontSize: l,
      padding: l,
      margin: l,
      perspective: l,
      lineHeight: ""
    };

    var h,
        u,
        f,
        p,
        _,
        c,
        d = /(?:\d|\-\d|\.\d|\-\.\d)+/g,
        m = /(?:\d|\-\d|\.\d|\-\.\d|\+=\d|\-=\d|\+=.\d|\-=\.\d)+/g,
        g = /(?:\+=|\-=|\-|\b)[\d\-\.]+[a-zA-Z0-9]*(?:%|\b)/gi,
        v = /(?![+-]?\d*\.?\d+|e[+-]\d+)[^0-9]/g,
        y = /(?:\d|\-|\+|=|#|\.)*/g,
        x = /opacity *= *([^)]*)/i,
        T = /opacity:([^;]*)/i,
        w = /alpha\(opacity *=.+?\)/i,
        b = /^(rgb|hsl)/,
        P = /([A-Z])/g,
        S = /-([a-z])/gi,
        R = /(^(?:url\(\"|url\())|(?:(\"\))$|\)$)/gi,
        C = function C(t, e) {
      return e.toUpperCase();
    },
        k = /(?:Left|Right|Width)/i,
        O = /(M11|M12|M21|M22)=[\d\-\.e]+/gi,
        A = /progid\:DXImageTransform\.Microsoft\.Matrix\(.+?\)/i,
        D = /,(?=[^\)]*(?:\(|$))/gi,
        M = Math.PI / 180,
        L = 180 / Math.PI,
        N = {},
        z = document,
        X = z.createElement("div"),
        I = z.createElement("img"),
        E = a._internals = {
      _specialProps: o
    },
        F = navigator.userAgent,
        Y = function () {
      var t,
          e = F.indexOf("Android"),
          i = z.createElement("div");
      return f = -1 !== F.indexOf("Safari") && -1 === F.indexOf("Chrome") && (-1 === e || Number(F.substr(e + 8, 1)) > 3), _ = f && 6 > Number(F.substr(F.indexOf("Version/") + 8, 1)), p = -1 !== F.indexOf("Firefox"), (/MSIE ([0-9]{1,}[\.0-9]{0,})/.exec(F) || /Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/.exec(F)) && (c = parseFloat(RegExp.$1)), i.innerHTML = "<a style='top:1px;opacity:.55;'>a</a>", t = i.getElementsByTagName("a")[0], t ? /^0.55/.test(t.style.opacity) : !1;
    }(),
        B = function B(t) {
      return x.test("string" == typeof t ? t : (t.currentStyle ? t.currentStyle.filter : t.style.filter) || "") ? parseFloat(RegExp.$1) / 100 : 1;
    },
        U = function U(t) {
      window.console && console.log(t);
    },
        j = "",
        W = "",
        V = function V(t, e) {
      e = e || X;
      var i,
          r,
          s = e.style;
      if (void 0 !== s[t]) return t;

      for (t = t.charAt(0).toUpperCase() + t.substr(1), i = ["O", "Moz", "ms", "Ms", "Webkit"], r = 5; --r > -1 && void 0 === s[i[r] + t];) {
        ;
      }

      return r >= 0 ? (W = 3 === r ? "ms" : i[r], j = "-" + W.toLowerCase() + "-", W + t) : null;
    },
        q = z.defaultView ? z.defaultView.getComputedStyle : function () {},
        H = a.getStyle = function (t, e, i, r, s) {
      var n;
      return Y || "opacity" !== e ? (!r && t.style[e] ? n = t.style[e] : (i = i || q(t)) ? n = i[e] || i.getPropertyValue(e) || i.getPropertyValue(e.replace(P, "-$1").toLowerCase()) : t.currentStyle && (n = t.currentStyle[e]), null == s || n && "none" !== n && "auto" !== n && "auto auto" !== n ? n : s) : B(t);
    },
        G = E.convertToPixels = function (t, i, r, s, n) {
      if ("px" === s || !s) return r;
      if ("auto" === s || !r) return 0;

      var o,
          l,
          h,
          u = k.test(i),
          f = t,
          p = X.style,
          _ = 0 > r;

      if (_ && (r = -r), "%" === s && -1 !== i.indexOf("border")) o = r / 100 * (u ? t.clientWidth : t.clientHeight);else {
        if (p.cssText = "border:0 solid red;position:" + H(t, "position") + ";line-height:0;", "%" !== s && f.appendChild) p[u ? "borderLeftWidth" : "borderTopWidth"] = r + s;else {
          if (f = t.parentNode || z.body, l = f._gsCache, h = e.ticker.frame, l && u && l.time === h) return l.width * r / 100;
          p[u ? "width" : "height"] = r + s;
        }
        f.appendChild(X), o = parseFloat(X[u ? "offsetWidth" : "offsetHeight"]), f.removeChild(X), u && "%" === s && a.cacheWidths !== !1 && (l = f._gsCache = f._gsCache || {}, l.time = h, l.width = 100 * (o / r)), 0 !== o || n || (o = G(t, i, r, s, !0));
      }
      return _ ? -o : o;
    },
        Q = E.calculateOffset = function (t, e, i) {
      if ("absolute" !== H(t, "position", i)) return 0;
      var r = "left" === e ? "Left" : "Top",
          s = H(t, "margin" + r, i);
      return t["offset" + r] - (G(t, e, parseFloat(s), s.replace(y, "")) || 0);
    },
        Z = function Z(t, e) {
      var i,
          r,
          s = {};
      if (e = e || q(t, null)) {
        if (i = e.length) for (; --i > -1;) {
          s[e[i].replace(S, C)] = e.getPropertyValue(e[i]);
        } else for (i in e) {
          s[i] = e[i];
        }
      } else if (e = t.currentStyle || t.style) for (i in e) {
        "string" == typeof i && void 0 === s[i] && (s[i.replace(S, C)] = e[i]);
      }
      return Y || (s.opacity = B(t)), r = Ae(t, e, !1), s.rotation = r.rotation, s.skewX = r.skewX, s.scaleX = r.scaleX, s.scaleY = r.scaleY, s.x = r.x, s.y = r.y, be && (s.z = r.z, s.rotationX = r.rotationX, s.rotationY = r.rotationY, s.scaleZ = r.scaleZ), s.filters && delete s.filters, s;
    },
        $ = function $(t, e, i, r, s) {
      var n,
          a,
          o,
          l = {},
          h = t.style;

      for (a in i) {
        "cssText" !== a && "length" !== a && isNaN(a) && (e[a] !== (n = i[a]) || s && s[a]) && -1 === a.indexOf("Origin") && ("number" == typeof n || "string" == typeof n) && (l[a] = "auto" !== n || "left" !== a && "top" !== a ? "" !== n && "auto" !== n && "none" !== n || "string" != typeof e[a] || "" === e[a].replace(v, "") ? n : 0 : Q(t, a), void 0 !== h[a] && (o = new fe(h, a, h[a], o)));
      }

      if (r) for (a in r) {
        "className" !== a && (l[a] = r[a]);
      }
      return {
        difs: l,
        firstMPT: o
      };
    },
        K = {
      width: ["Left", "Right"],
      height: ["Top", "Bottom"]
    },
        J = ["marginLeft", "marginRight", "marginTop", "marginBottom"],
        te = function te(t, e, i) {
      var r = parseFloat("width" === e ? t.offsetWidth : t.offsetHeight),
          s = K[e],
          n = s.length;

      for (i = i || q(t, null); --n > -1;) {
        r -= parseFloat(H(t, "padding" + s[n], i, !0)) || 0, r -= parseFloat(H(t, "border" + s[n] + "Width", i, !0)) || 0;
      }

      return r;
    },
        ee = function ee(t, e) {
      (null == t || "" === t || "auto" === t || "auto auto" === t) && (t = "0 0");
      var i = t.split(" "),
          r = -1 !== t.indexOf("left") ? "0%" : -1 !== t.indexOf("right") ? "100%" : i[0],
          s = -1 !== t.indexOf("top") ? "0%" : -1 !== t.indexOf("bottom") ? "100%" : i[1];
      return null == s ? s = "0" : "center" === s && (s = "50%"), ("center" === r || isNaN(parseFloat(r)) && -1 === (r + "").indexOf("=")) && (r = "50%"), e && (e.oxp = -1 !== r.indexOf("%"), e.oyp = -1 !== s.indexOf("%"), e.oxr = "=" === r.charAt(1), e.oyr = "=" === s.charAt(1), e.ox = parseFloat(r.replace(v, "")), e.oy = parseFloat(s.replace(v, ""))), r + " " + s + (i.length > 2 ? " " + i[2] : "");
    },
        ie = function ie(t, e) {
      return "string" == typeof t && "=" === t.charAt(1) ? parseInt(t.charAt(0) + "1", 10) * parseFloat(t.substr(2)) : parseFloat(t) - parseFloat(e);
    },
        re = function re(t, e) {
      return null == t ? e : "string" == typeof t && "=" === t.charAt(1) ? parseInt(t.charAt(0) + "1", 10) * parseFloat(t.substr(2)) + e : parseFloat(t);
    },
        se = function se(t, e, i, r) {
      var s,
          n,
          a,
          o,
          l = 1e-6;
      return null == t ? o = e : "number" == typeof t ? o = t : (s = 360, n = t.split("_"), a = Number(n[0].replace(v, "")) * (-1 === t.indexOf("rad") ? 1 : L) - ("=" === t.charAt(1) ? 0 : e), n.length && (r && (r[i] = e + a), -1 !== t.indexOf("short") && (a %= s, a !== a % (s / 2) && (a = 0 > a ? a + s : a - s)), -1 !== t.indexOf("_cw") && 0 > a ? a = (a + 9999999999 * s) % s - (0 | a / s) * s : -1 !== t.indexOf("ccw") && a > 0 && (a = (a - 9999999999 * s) % s - (0 | a / s) * s)), o = e + a), l > o && o > -l && (o = 0), o;
    },
        ne = {
      aqua: [0, 255, 255],
      lime: [0, 255, 0],
      silver: [192, 192, 192],
      black: [0, 0, 0],
      maroon: [128, 0, 0],
      teal: [0, 128, 128],
      blue: [0, 0, 255],
      navy: [0, 0, 128],
      white: [255, 255, 255],
      fuchsia: [255, 0, 255],
      olive: [128, 128, 0],
      yellow: [255, 255, 0],
      orange: [255, 165, 0],
      gray: [128, 128, 128],
      purple: [128, 0, 128],
      green: [0, 128, 0],
      red: [255, 0, 0],
      pink: [255, 192, 203],
      cyan: [0, 255, 255],
      transparent: [255, 255, 255, 0]
    },
        ae = function ae(t, e, i) {
      return t = 0 > t ? t + 1 : t > 1 ? t - 1 : t, 0 | 255 * (1 > 6 * t ? e + 6 * (i - e) * t : .5 > t ? i : 2 > 3 * t ? e + 6 * (i - e) * (2 / 3 - t) : e) + .5;
    },
        oe = a.parseColor = function (t) {
      var e, i, r, s, n, a;
      return t && "" !== t ? "number" == typeof t ? [t >> 16, 255 & t >> 8, 255 & t] : ("," === t.charAt(t.length - 1) && (t = t.substr(0, t.length - 1)), ne[t] ? ne[t] : "#" === t.charAt(0) ? (4 === t.length && (e = t.charAt(1), i = t.charAt(2), r = t.charAt(3), t = "#" + e + e + i + i + r + r), t = parseInt(t.substr(1), 16), [t >> 16, 255 & t >> 8, 255 & t]) : "hsl" === t.substr(0, 3) ? (t = t.match(d), s = Number(t[0]) % 360 / 360, n = Number(t[1]) / 100, a = Number(t[2]) / 100, i = .5 >= a ? a * (n + 1) : a + n - a * n, e = 2 * a - i, t.length > 3 && (t[3] = Number(t[3])), t[0] = ae(s + 1 / 3, e, i), t[1] = ae(s, e, i), t[2] = ae(s - 1 / 3, e, i), t) : (t = t.match(d) || ne.transparent, t[0] = Number(t[0]), t[1] = Number(t[1]), t[2] = Number(t[2]), t.length > 3 && (t[3] = Number(t[3])), t)) : ne.black;
    },
        le = "(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#.+?\\b";

    for (l in ne) {
      le += "|" + l + "\\b";
    }

    le = RegExp(le + ")", "gi");

    var he = function he(t, e, i, r) {
      if (null == t) return function (t) {
        return t;
      };
      var s,
          n = e ? (t.match(le) || [""])[0] : "",
          a = t.split(n).join("").match(g) || [],
          o = t.substr(0, t.indexOf(a[0])),
          l = ")" === t.charAt(t.length - 1) ? ")" : "",
          h = -1 !== t.indexOf(" ") ? " " : ",",
          u = a.length,
          f = u > 0 ? a[0].replace(d, "") : "";
      return u ? s = e ? function (t) {
        var e, p, _, c;

        if ("number" == typeof t) t += f;else if (r && D.test(t)) {
          for (c = t.replace(D, "|").split("|"), _ = 0; c.length > _; _++) {
            c[_] = s(c[_]);
          }

          return c.join(",");
        }
        if (e = (t.match(le) || [n])[0], p = t.split(e).join("").match(g) || [], _ = p.length, u > _--) for (; u > ++_;) {
          p[_] = i ? p[0 | (_ - 1) / 2] : a[_];
        }
        return o + p.join(h) + h + e + l + (-1 !== t.indexOf("inset") ? " inset" : "");
      } : function (t) {
        var e, n, p;
        if ("number" == typeof t) t += f;else if (r && D.test(t)) {
          for (n = t.replace(D, "|").split("|"), p = 0; n.length > p; p++) {
            n[p] = s(n[p]);
          }

          return n.join(",");
        }
        if (e = t.match(g) || [], p = e.length, u > p--) for (; u > ++p;) {
          e[p] = i ? e[0 | (p - 1) / 2] : a[p];
        }
        return o + e.join(h) + l;
      } : function (t) {
        return t;
      };
    },
        ue = function ue(t) {
      return t = t.split(","), function (e, i, r, s, n, a, o) {
        var l,
            h = (i + "").split(" ");

        for (o = {}, l = 0; 4 > l; l++) {
          o[t[l]] = h[l] = h[l] || h[(l - 1) / 2 >> 0];
        }

        return s.parse(e, o, n, a);
      };
    },
        fe = (E._setPluginRatio = function (t) {
      this.plugin.setRatio(t);

      for (var e, i, r, s, n = this.data, a = n.proxy, o = n.firstMPT, l = 1e-6; o;) {
        e = a[o.v], o.r ? e = Math.round(e) : l > e && e > -l && (e = 0), o.t[o.p] = e, o = o._next;
      }

      if (n.autoRotate && (n.autoRotate.rotation = a.rotation), 1 === t) for (o = n.firstMPT; o;) {
        if (i = o.t, i.type) {
          if (1 === i.type) {
            for (s = i.xs0 + i.s + i.xs1, r = 1; i.l > r; r++) {
              s += i["xn" + r] + i["xs" + (r + 1)];
            }

            i.e = s;
          }
        } else i.e = i.s + i.xs0;

        o = o._next;
      }
    }, function (t, e, i, r, s) {
      this.t = t, this.p = e, this.v = i, this.r = s, r && (r._prev = this, this._next = r);
    }),
        pe = (E._parseToProxy = function (t, e, i, r, s, n) {
      var a,
          o,
          l,
          h,
          u,
          f = r,
          p = {},
          _ = {},
          c = i._transform,
          d = N;

      for (i._transform = null, N = e, r = u = i.parse(t, e, r, s), N = d, n && (i._transform = c, f && (f._prev = null, f._prev && (f._prev._next = null))); r && r !== f;) {
        if (1 >= r.type && (o = r.p, _[o] = r.s + r.c, p[o] = r.s, n || (h = new fe(r, "s", o, h, r.r), r.c = 0), 1 === r.type)) for (a = r.l; --a > 0;) {
          l = "xn" + a, o = r.p + "_" + l, _[o] = r.data[l], p[o] = r[l], n || (h = new fe(r, l, o, h, r.rxp[l]));
        }
        r = r._next;
      }

      return {
        proxy: p,
        end: _,
        firstMPT: h,
        pt: u
      };
    }, E.CSSPropTween = function (t, e, r, s, a, o, l, h, u, f, p) {
      this.t = t, this.p = e, this.s = r, this.c = s, this.n = l || e, t instanceof pe || n.push(this.n), this.r = h, this.type = o || 0, u && (this.pr = u, i = !0), this.b = void 0 === f ? r : f, this.e = void 0 === p ? r + s : p, a && (this._next = a, a._prev = this);
    }),
        _e = a.parseComplex = function (t, e, i, r, s, n, a, o, l, u) {
      i = i || n || "", a = new pe(t, e, 0, 0, a, u ? 2 : 1, null, !1, o, i, r), r += "";

      var f,
          p,
          _,
          c,
          g,
          v,
          y,
          x,
          T,
          w,
          P,
          S,
          R = i.split(", ").join(",").split(" "),
          C = r.split(", ").join(",").split(" "),
          k = R.length,
          O = h !== !1;

      for ((-1 !== r.indexOf(",") || -1 !== i.indexOf(",")) && (R = R.join(" ").replace(D, ", ").split(" "), C = C.join(" ").replace(D, ", ").split(" "), k = R.length), k !== C.length && (R = (n || "").split(" "), k = R.length), a.plugin = l, a.setRatio = u, f = 0; k > f; f++) {
        if (c = R[f], g = C[f], x = parseFloat(c), x || 0 === x) a.appendXtra("", x, ie(g, x), g.replace(m, ""), O && -1 !== g.indexOf("px"), !0);else if (s && ("#" === c.charAt(0) || ne[c] || b.test(c))) S = "," === g.charAt(g.length - 1) ? ")," : ")", c = oe(c), g = oe(g), T = c.length + g.length > 6, T && !Y && 0 === g[3] ? (a["xs" + a.l] += a.l ? " transparent" : "transparent", a.e = a.e.split(C[f]).join("transparent")) : (Y || (T = !1), a.appendXtra(T ? "rgba(" : "rgb(", c[0], g[0] - c[0], ",", !0, !0).appendXtra("", c[1], g[1] - c[1], ",", !0).appendXtra("", c[2], g[2] - c[2], T ? "," : S, !0), T && (c = 4 > c.length ? 1 : c[3], a.appendXtra("", c, (4 > g.length ? 1 : g[3]) - c, S, !1)));else if (v = c.match(d)) {
          if (y = g.match(m), !y || y.length !== v.length) return a;

          for (_ = 0, p = 0; v.length > p; p++) {
            P = v[p], w = c.indexOf(P, _), a.appendXtra(c.substr(_, w - _), Number(P), ie(y[p], P), "", O && "px" === c.substr(w + P.length, 2), 0 === p), _ = w + P.length;
          }

          a["xs" + a.l] += c.substr(_);
        } else a["xs" + a.l] += a.l ? " " + c : c;
      }

      if (-1 !== r.indexOf("=") && a.data) {
        for (S = a.xs0 + a.data.s, f = 1; a.l > f; f++) {
          S += a["xs" + f] + a.data["xn" + f];
        }

        a.e = S + a["xs" + f];
      }

      return a.l || (a.type = -1, a.xs0 = a.e), a.xfirst || a;
    },
        ce = 9;

    for (l = pe.prototype, l.l = l.pr = 0; --ce > 0;) {
      l["xn" + ce] = 0, l["xs" + ce] = "";
    }

    l.xs0 = "", l._next = l._prev = l.xfirst = l.data = l.plugin = l.setRatio = l.rxp = null, l.appendXtra = function (t, e, i, r, s, n) {
      var a = this,
          o = a.l;
      return a["xs" + o] += n && o ? " " + t : t || "", i || 0 === o || a.plugin ? (a.l++, a.type = a.setRatio ? 2 : 1, a["xs" + a.l] = r || "", o > 0 ? (a.data["xn" + o] = e + i, a.rxp["xn" + o] = s, a["xn" + o] = e, a.plugin || (a.xfirst = new pe(a, "xn" + o, e, i, a.xfirst || a, 0, a.n, s, a.pr), a.xfirst.xs0 = 0), a) : (a.data = {
        s: e + i
      }, a.rxp = {}, a.s = e, a.c = i, a.r = s, a)) : (a["xs" + o] += e + (r || ""), a);
    };

    var de = function de(t, e) {
      e = e || {}, this.p = e.prefix ? V(t) || t : t, o[t] = o[this.p] = this, this.format = e.formatter || he(e.defaultValue, e.color, e.collapsible, e.multi), e.parser && (this.parse = e.parser), this.clrs = e.color, this.multi = e.multi, this.keyword = e.keyword, this.dflt = e.defaultValue, this.pr = e.priority || 0;
    },
        me = E._registerComplexSpecialProp = function (t, e, i) {
      "object" != _typeof(e) && (e = {
        parser: i
      });
      var r,
          s,
          n = t.split(","),
          a = e.defaultValue;

      for (i = i || [a], r = 0; n.length > r; r++) {
        e.prefix = 0 === r && e.prefix, e.defaultValue = i[r] || a, s = new de(n[r], e);
      }
    },
        ge = function ge(t) {
      if (!o[t]) {
        var e = t.charAt(0).toUpperCase() + t.substr(1) + "Plugin";
        me(t, {
          parser: function parser(t, i, r, s, n, a, l) {
            var h = (_gsScope.GreenSockGlobals || _gsScope).com.greensock.plugins[e];
            return h ? (h._cssRegister(), o[r].parse(t, i, r, s, n, a, l)) : (U("Error: " + e + " js file not loaded."), n);
          }
        });
      }
    };

    l = de.prototype, l.parseComplex = function (t, e, i, r, s, n) {
      var a,
          o,
          l,
          h,
          u,
          f,
          p = this.keyword;

      if (this.multi && (D.test(i) || D.test(e) ? (o = e.replace(D, "|").split("|"), l = i.replace(D, "|").split("|")) : p && (o = [e], l = [i])), l) {
        for (h = l.length > o.length ? l.length : o.length, a = 0; h > a; a++) {
          e = o[a] = o[a] || this.dflt, i = l[a] = l[a] || this.dflt, p && (u = e.indexOf(p), f = i.indexOf(p), u !== f && (i = -1 === f ? l : o, i[a] += " " + p));
        }

        e = o.join(", "), i = l.join(", ");
      }

      return _e(t, this.p, e, i, this.clrs, this.dflt, r, this.pr, s, n);
    }, l.parse = function (t, e, i, r, n, a) {
      return this.parseComplex(t.style, this.format(H(t, this.p, s, !1, this.dflt)), this.format(e), n, a);
    }, a.registerSpecialProp = function (t, e, i) {
      me(t, {
        parser: function parser(t, r, s, n, a, o) {
          var l = new pe(t, s, 0, 0, a, 2, s, !1, i);
          return l.plugin = o, l.setRatio = e(t, r, n._tween, s), l;
        },
        priority: i
      });
    };

    var ve,
        ye = "scaleX,scaleY,scaleZ,x,y,z,skewX,skewY,rotation,rotationX,rotationY,perspective,xPercent,yPercent".split(","),
        xe = V("transform"),
        Te = j + "transform",
        we = V("transformOrigin"),
        be = null !== V("perspective"),
        Pe = E.Transform = function () {
      this.skewY = 0;
    },
        Se = window.SVGElement,
        Re = function Re(t, e, i) {
      var r,
          s = z.createElementNS("http://www.w3.org/2000/svg", t),
          n = /([a-z])([A-Z])/g;

      for (r in i) {
        s.setAttributeNS(null, r.replace(n, "$1-$2").toLowerCase(), i[r]);
      }

      return e.appendChild(s), s;
    },
        Ce = document.documentElement,
        ke = function () {
      var t,
          e,
          i,
          r = c || /Android/i.test(F) && !window.chrome;
      return z.createElementNS && !r && (t = Re("svg", Ce), e = Re("rect", t, {
        width: 100,
        height: 50,
        x: 100
      }), i = e.getBoundingClientRect().left, e.style[we] = "50% 50%", e.style[xe] = "scale(0.5,0.5)", r = i === e.getBoundingClientRect().left, Ce.removeChild(t)), r;
    }(),
        Oe = function Oe(t, e, i) {
      var r = t.getBBox();
      e = ee(e).split(" "), i.xOrigin = (-1 !== e[0].indexOf("%") ? parseFloat(e[0]) / 100 * r.width : parseFloat(e[0])) + r.x, i.yOrigin = (-1 !== e[1].indexOf("%") ? parseFloat(e[1]) / 100 * r.height : parseFloat(e[1])) + r.y;
    },
        Ae = E.getTransform = function (t, e, i, r) {
      if (t._gsTransform && i && !r) return t._gsTransform;

      var n,
          o,
          l,
          h,
          u,
          f,
          p,
          _,
          c,
          d,
          m,
          g,
          v,
          y = i ? t._gsTransform || new Pe() : new Pe(),
          x = 0 > y.scaleX,
          T = 2e-5,
          w = 1e5,
          b = 179.99,
          P = b * M,
          S = be ? parseFloat(H(t, we, e, !1, "0 0 0").split(" ")[2]) || y.zOrigin || 0 : 0,
          R = parseFloat(a.defaultTransformPerspective) || 0;

      if (xe ? n = H(t, Te, e, !0) : t.currentStyle && (n = t.currentStyle.filter.match(O), n = n && 4 === n.length ? [n[0].substr(4), Number(n[2].substr(4)), Number(n[1].substr(4)), n[3].substr(4), y.x || 0, y.y || 0].join(",") : ""), n && "none" !== n && "matrix(1, 0, 0, 1, 0, 0)" !== n) {
        for (o = (n || "").match(/(?:\-|\b)[\d\-\.e]+\b/gi) || [], l = o.length; --l > -1;) {
          h = Number(o[l]), o[l] = (u = h - (h |= 0)) ? (0 | u * w + (0 > u ? -.5 : .5)) / w + h : h;
        }

        if (16 === o.length) {
          var C = o[8],
              k = o[9],
              A = o[10],
              D = o[12],
              N = o[13],
              z = o[14];

          if (y.zOrigin && (z = -y.zOrigin, D = C * z - o[12], N = k * z - o[13], z = A * z + y.zOrigin - o[14]), !i || r || null == y.rotationX) {
            var X,
                I,
                E,
                F,
                Y,
                B,
                U,
                j = o[0],
                W = o[1],
                V = o[2],
                q = o[3],
                G = o[4],
                Q = o[5],
                Z = o[6],
                $ = o[7],
                K = o[11],
                J = Math.atan2(Z, A),
                te = -P > J || J > P;
            y.rotationX = J * L, J && (F = Math.cos(-J), Y = Math.sin(-J), X = G * F + C * Y, I = Q * F + k * Y, E = Z * F + A * Y, C = G * -Y + C * F, k = Q * -Y + k * F, A = Z * -Y + A * F, K = $ * -Y + K * F, G = X, Q = I, Z = E), J = Math.atan2(C, j), y.rotationY = J * L, J && (B = -P > J || J > P, F = Math.cos(-J), Y = Math.sin(-J), X = j * F - C * Y, I = W * F - k * Y, E = V * F - A * Y, k = W * Y + k * F, A = V * Y + A * F, K = q * Y + K * F, j = X, W = I, V = E), J = Math.atan2(W, Q), y.rotation = J * L, J && (U = -P > J || J > P, F = Math.cos(-J), Y = Math.sin(-J), j = j * F + G * Y, I = W * F + Q * Y, Q = W * -Y + Q * F, Z = V * -Y + Z * F, W = I), U && te ? y.rotation = y.rotationX = 0 : U && B ? y.rotation = y.rotationY = 0 : B && te && (y.rotationY = y.rotationX = 0), y.scaleX = (0 | Math.sqrt(j * j + W * W) * w + .5) / w, y.scaleY = (0 | Math.sqrt(Q * Q + k * k) * w + .5) / w, y.scaleZ = (0 | Math.sqrt(Z * Z + A * A) * w + .5) / w, y.skewX = 0, y.perspective = K ? 1 / (0 > K ? -K : K) : 0, y.x = D, y.y = N, y.z = z;
          }
        } else if (!(be && !r && o.length && y.x === o[4] && y.y === o[5] && (y.rotationX || y.rotationY) || void 0 !== y.x && "none" === H(t, "display", e))) {
          var ee = o.length >= 6,
              ie = ee ? o[0] : 1,
              re = o[1] || 0,
              se = o[2] || 0,
              ne = ee ? o[3] : 1;
          y.x = o[4] || 0, y.y = o[5] || 0, f = Math.sqrt(ie * ie + re * re), p = Math.sqrt(ne * ne + se * se), _ = ie || re ? Math.atan2(re, ie) * L : y.rotation || 0, c = se || ne ? Math.atan2(se, ne) * L + _ : y.skewX || 0, d = f - Math.abs(y.scaleX || 0), m = p - Math.abs(y.scaleY || 0), Math.abs(c) > 90 && 270 > Math.abs(c) && (x ? (f *= -1, c += 0 >= _ ? 180 : -180, _ += 0 >= _ ? 180 : -180) : (p *= -1, c += 0 >= c ? 180 : -180)), g = (_ - y.rotation) % 180, v = (c - y.skewX) % 180, (void 0 === y.skewX || d > T || -T > d || m > T || -T > m || g > -b && b > g && false | g * w || v > -b && b > v && false | v * w) && (y.scaleX = f, y.scaleY = p, y.rotation = _, y.skewX = c), be && (y.rotationX = y.rotationY = y.z = 0, y.perspective = R, y.scaleZ = 1);
        }

        y.zOrigin = S;

        for (l in y) {
          T > y[l] && y[l] > -T && (y[l] = 0);
        }
      } else y = {
        x: 0,
        y: 0,
        z: 0,
        scaleX: 1,
        scaleY: 1,
        scaleZ: 1,
        skewX: 0,
        skewY: 0,
        perspective: R,
        rotation: 0,
        rotationX: 0,
        rotationY: 0,
        zOrigin: 0
      };

      return i && (t._gsTransform = y), y.svg = Se && t instanceof Se && t.parentNode instanceof Se, y.svg && (Oe(t, H(t, we, s, !1, "50% 50%") + "", y), ve = a.useSVGTransformAttr || ke), y.xPercent = y.yPercent = 0, y;
    },
        De = function De(t) {
      var e,
          i,
          r = this.data,
          s = -r.rotation * M,
          n = s + r.skewX * M,
          a = 1e5,
          o = (0 | Math.cos(s) * r.scaleX * a) / a,
          l = (0 | Math.sin(s) * r.scaleX * a) / a,
          h = (0 | Math.sin(n) * -r.scaleY * a) / a,
          u = (0 | Math.cos(n) * r.scaleY * a) / a,
          f = this.t.style,
          p = this.t.currentStyle;

      if (p) {
        i = l, l = -h, h = -i, e = p.filter, f.filter = "";

        var _,
            d,
            m = this.t.offsetWidth,
            g = this.t.offsetHeight,
            v = "absolute" !== p.position,
            T = "progid:DXImageTransform.Microsoft.Matrix(M11=" + o + ", M12=" + l + ", M21=" + h + ", M22=" + u,
            w = r.x + m * r.xPercent / 100,
            b = r.y + g * r.yPercent / 100;

        if (null != r.ox && (_ = (r.oxp ? .01 * m * r.ox : r.ox) - m / 2, d = (r.oyp ? .01 * g * r.oy : r.oy) - g / 2, w += _ - (_ * o + d * l), b += d - (_ * h + d * u)), v ? (_ = m / 2, d = g / 2, T += ", Dx=" + (_ - (_ * o + d * l) + w) + ", Dy=" + (d - (_ * h + d * u) + b) + ")") : T += ", sizingMethod='auto expand')", f.filter = -1 !== e.indexOf("DXImageTransform.Microsoft.Matrix(") ? e.replace(A, T) : T + " " + e, (0 === t || 1 === t) && 1 === o && 0 === l && 0 === h && 1 === u && (v && -1 === T.indexOf("Dx=0, Dy=0") || x.test(e) && 100 !== parseFloat(RegExp.$1) || -1 === e.indexOf("gradient(" && e.indexOf("Alpha")) && f.removeAttribute("filter")), !v) {
          var P,
              S,
              R,
              C = 8 > c ? 1 : -1;

          for (_ = r.ieOffsetX || 0, d = r.ieOffsetY || 0, r.ieOffsetX = Math.round((m - ((0 > o ? -o : o) * m + (0 > l ? -l : l) * g)) / 2 + w), r.ieOffsetY = Math.round((g - ((0 > u ? -u : u) * g + (0 > h ? -h : h) * m)) / 2 + b), ce = 0; 4 > ce; ce++) {
            S = J[ce], P = p[S], i = -1 !== P.indexOf("px") ? parseFloat(P) : G(this.t, S, parseFloat(P), P.replace(y, "")) || 0, R = i !== r[S] ? 2 > ce ? -r.ieOffsetX : -r.ieOffsetY : 2 > ce ? _ - r.ieOffsetX : d - r.ieOffsetY, f[S] = (r[S] = Math.round(i - R * (0 === ce || 2 === ce ? 1 : C))) + "px";
          }
        }
      }
    },
        Me = E.set3DTransformRatio = function (t) {
      var e,
          i,
          r,
          s,
          n,
          a,
          o,
          l,
          h,
          u,
          f,
          _,
          c,
          d,
          m,
          g,
          v,
          y,
          x,
          T,
          w,
          b,
          P,
          S = this.data,
          R = this.t.style,
          C = S.rotation * M,
          k = S.scaleX,
          O = S.scaleY,
          A = S.scaleZ,
          D = S.x,
          L = S.y,
          N = S.z,
          z = S.perspective;

      if (!(1 !== t && 0 !== t || "auto" !== S.force3D || S.rotationY || S.rotationX || 1 !== A || z || N)) return Le.call(this, t), void 0;

      if (p) {
        var X = 1e-4;
        X > k && k > -X && (k = A = 2e-5), X > O && O > -X && (O = A = 2e-5), !z || S.z || S.rotationX || S.rotationY || (z = 0);
      }

      if (C || S.skewX) y = Math.cos(C), x = Math.sin(C), e = y, n = x, S.skewX && (C -= S.skewX * M, y = Math.cos(C), x = Math.sin(C), "simple" === S.skewType && (T = Math.tan(S.skewX * M), T = Math.sqrt(1 + T * T), y *= T, x *= T)), i = -x, a = y;else {
        if (!(S.rotationY || S.rotationX || 1 !== A || z || S.svg)) return R[xe] = (S.xPercent || S.yPercent ? "translate(" + S.xPercent + "%," + S.yPercent + "%) translate3d(" : "translate3d(") + D + "px," + L + "px," + N + "px)" + (1 !== k || 1 !== O ? " scale(" + k + "," + O + ")" : ""), void 0;
        e = a = 1, i = n = 0;
      }
      f = 1, r = s = o = l = h = u = _ = c = d = 0, m = z ? -1 / z : 0, g = S.zOrigin, v = 1e5, C = S.rotationY * M, C && (y = Math.cos(C), x = Math.sin(C), h = f * -x, c = m * -x, r = e * x, o = n * x, f *= y, m *= y, e *= y, n *= y), C = S.rotationX * M, C && (y = Math.cos(C), x = Math.sin(C), T = i * y + r * x, w = a * y + o * x, b = u * y + f * x, P = d * y + m * x, r = i * -x + r * y, o = a * -x + o * y, f = u * -x + f * y, m = d * -x + m * y, i = T, a = w, u = b, d = P), 1 !== A && (r *= A, o *= A, f *= A, m *= A), 1 !== O && (i *= O, a *= O, u *= O, d *= O), 1 !== k && (e *= k, n *= k, h *= k, c *= k), g && (_ -= g, s = r * _, l = o * _, _ = f * _ + g), S.svg && (s += S.xOrigin - (S.xOrigin * e + S.yOrigin * i), l += S.yOrigin - (S.xOrigin * n + S.yOrigin * a)), s = (T = (s += D) - (s |= 0)) ? (0 | T * v + (0 > T ? -.5 : .5)) / v + s : s, l = (T = (l += L) - (l |= 0)) ? (0 | T * v + (0 > T ? -.5 : .5)) / v + l : l, _ = (T = (_ += N) - (_ |= 0)) ? (0 | T * v + (0 > T ? -.5 : .5)) / v + _ : _, R[xe] = (S.xPercent || S.yPercent ? "translate(" + S.xPercent + "%," + S.yPercent + "%) matrix3d(" : "matrix3d(") + [(0 | e * v) / v, (0 | n * v) / v, (0 | h * v) / v, (0 | c * v) / v, (0 | i * v) / v, (0 | a * v) / v, (0 | u * v) / v, (0 | d * v) / v, (0 | r * v) / v, (0 | o * v) / v, (0 | f * v) / v, (0 | m * v) / v, s, l, _, z ? 1 + -_ / z : 1].join(",") + ")";
    },
        Le = E.set2DTransformRatio = function (t) {
      var e,
          i,
          r,
          s,
          n,
          a,
          o,
          l,
          h,
          u,
          f,
          p = this.data,
          _ = this.t,
          c = _.style,
          d = p.x,
          m = p.y;
      return !(p.rotationX || p.rotationY || p.z || p.force3D === !0 || "auto" === p.force3D && 1 !== t && 0 !== t) || p.svg && ve || !be ? (s = p.scaleX, n = p.scaleY, p.rotation || p.skewX || p.svg ? (e = p.rotation * M, i = e - p.skewX * M, r = 1e5, a = Math.cos(e) * s, o = Math.sin(e) * s, l = Math.sin(i) * -n, h = Math.cos(i) * n, p.svg && (d += p.xOrigin - (p.xOrigin * a + p.yOrigin * l), m += p.yOrigin - (p.xOrigin * o + p.yOrigin * h), f = 1e-6, f > d && d > -f && (d = 0), f > m && m > -f && (m = 0)), u = (0 | a * r) / r + "," + (0 | o * r) / r + "," + (0 | l * r) / r + "," + (0 | h * r) / r + "," + d + "," + m + ")", p.svg && ve ? _.setAttribute("transform", "matrix(" + u) : c[xe] = (p.xPercent || p.yPercent ? "translate(" + p.xPercent + "%," + p.yPercent + "%) matrix(" : "matrix(") + u) : c[xe] = (p.xPercent || p.yPercent ? "translate(" + p.xPercent + "%," + p.yPercent + "%) matrix(" : "matrix(") + s + ",0,0," + n + "," + d + "," + m + ")", void 0) : (this.setRatio = Me, Me.call(this, t), void 0);
    };

    me("transform,scale,scaleX,scaleY,scaleZ,x,y,z,rotation,rotationX,rotationY,rotationZ,skewX,skewY,shortRotation,shortRotationX,shortRotationY,shortRotationZ,transformOrigin,transformPerspective,directionalRotation,parseTransform,force3D,skewType,xPercent,yPercent", {
      parser: function parser(t, e, i, r, n, o, l) {
        if (r._transform) return n;

        var h,
            u,
            f,
            p,
            _,
            c,
            d,
            m = r._transform = Ae(t, s, !0, l.parseTransform),
            g = t.style,
            v = 1e-6,
            y = ye.length,
            x = l,
            T = {};

        if ("string" == typeof x.transform && xe) f = X.style, f[xe] = x.transform, f.display = "block", f.position = "absolute", z.body.appendChild(X), h = Ae(X, null, !1), z.body.removeChild(X);else if ("object" == _typeof(x)) {
          if (h = {
            scaleX: re(null != x.scaleX ? x.scaleX : x.scale, m.scaleX),
            scaleY: re(null != x.scaleY ? x.scaleY : x.scale, m.scaleY),
            scaleZ: re(x.scaleZ, m.scaleZ),
            x: re(x.x, m.x),
            y: re(x.y, m.y),
            z: re(x.z, m.z),
            xPercent: re(x.xPercent, m.xPercent),
            yPercent: re(x.yPercent, m.yPercent),
            perspective: re(x.transformPerspective, m.perspective)
          }, d = x.directionalRotation, null != d) if ("object" == _typeof(d)) for (f in d) {
            x[f] = d[f];
          } else x.rotation = d;
          "string" == typeof x.x && -1 !== x.x.indexOf("%") && (h.x = 0, h.xPercent = re(x.x, m.xPercent)), "string" == typeof x.y && -1 !== x.y.indexOf("%") && (h.y = 0, h.yPercent = re(x.y, m.yPercent)), h.rotation = se("rotation" in x ? x.rotation : "shortRotation" in x ? x.shortRotation + "_short" : "rotationZ" in x ? x.rotationZ : m.rotation, m.rotation, "rotation", T), be && (h.rotationX = se("rotationX" in x ? x.rotationX : "shortRotationX" in x ? x.shortRotationX + "_short" : m.rotationX || 0, m.rotationX, "rotationX", T), h.rotationY = se("rotationY" in x ? x.rotationY : "shortRotationY" in x ? x.shortRotationY + "_short" : m.rotationY || 0, m.rotationY, "rotationY", T)), h.skewX = null == x.skewX ? m.skewX : se(x.skewX, m.skewX), h.skewY = null == x.skewY ? m.skewY : se(x.skewY, m.skewY), (u = h.skewY - m.skewY) && (h.skewX += u, h.rotation += u);
        }

        for (be && null != x.force3D && (m.force3D = x.force3D, c = !0), m.skewType = x.skewType || m.skewType || a.defaultSkewType, _ = m.force3D || m.z || m.rotationX || m.rotationY || h.z || h.rotationX || h.rotationY || h.perspective, _ || null == x.scale || (h.scaleZ = 1); --y > -1;) {
          i = ye[y], p = h[i] - m[i], (p > v || -v > p || null != x[i] || null != N[i]) && (c = !0, n = new pe(m, i, m[i], p, n), i in T && (n.e = T[i]), n.xs0 = 0, n.plugin = o, r._overwriteProps.push(n.n));
        }

        return p = x.transformOrigin, p && m.svg && (Oe(t, p, h), n = new pe(m, "xOrigin", m.xOrigin, h.xOrigin - m.xOrigin, n, -1, "transformOrigin"), n.b = m.xOrigin, n.e = n.xs0 = h.xOrigin, n = new pe(m, "yOrigin", m.yOrigin, h.yOrigin - m.yOrigin, n, -1, "transformOrigin"), n.b = m.yOrigin, n.e = n.xs0 = h.yOrigin, p = "0px 0px"), (p || be && _ && m.zOrigin) && (xe ? (c = !0, i = we, p = (p || H(t, i, s, !1, "50% 50%")) + "", n = new pe(g, i, 0, 0, n, -1, "transformOrigin"), n.b = g[i], n.plugin = o, be ? (f = m.zOrigin, p = p.split(" "), m.zOrigin = (p.length > 2 && (0 === f || "0px" !== p[2]) ? parseFloat(p[2]) : f) || 0, n.xs0 = n.e = p[0] + " " + (p[1] || "50%") + " 0px", n = new pe(m, "zOrigin", 0, 0, n, -1, n.n), n.b = f, n.xs0 = n.e = m.zOrigin) : n.xs0 = n.e = p) : ee(p + "", m)), c && (r._transformType = m.svg && ve || !_ && 3 !== this._transformType ? 2 : 3), n;
      },
      prefix: !0
    }), me("boxShadow", {
      defaultValue: "0px 0px 0px 0px #999",
      prefix: !0,
      color: !0,
      multi: !0,
      keyword: "inset"
    }), me("borderRadius", {
      defaultValue: "0px",
      parser: function parser(t, e, i, n, a) {
        e = this.format(e);

        var o,
            l,
            h,
            u,
            f,
            p,
            _,
            c,
            d,
            m,
            g,
            v,
            y,
            x,
            T,
            w,
            b = ["borderTopLeftRadius", "borderTopRightRadius", "borderBottomRightRadius", "borderBottomLeftRadius"],
            P = t.style;

        for (d = parseFloat(t.offsetWidth), m = parseFloat(t.offsetHeight), o = e.split(" "), l = 0; b.length > l; l++) {
          this.p.indexOf("border") && (b[l] = V(b[l])), f = u = H(t, b[l], s, !1, "0px"), -1 !== f.indexOf(" ") && (u = f.split(" "), f = u[0], u = u[1]), p = h = o[l], _ = parseFloat(f), v = f.substr((_ + "").length), y = "=" === p.charAt(1), y ? (c = parseInt(p.charAt(0) + "1", 10), p = p.substr(2), c *= parseFloat(p), g = p.substr((c + "").length - (0 > c ? 1 : 0)) || "") : (c = parseFloat(p), g = p.substr((c + "").length)), "" === g && (g = r[i] || v), g !== v && (x = G(t, "borderLeft", _, v), T = G(t, "borderTop", _, v), "%" === g ? (f = 100 * (x / d) + "%", u = 100 * (T / m) + "%") : "em" === g ? (w = G(t, "borderLeft", 1, "em"), f = x / w + "em", u = T / w + "em") : (f = x + "px", u = T + "px"), y && (p = parseFloat(f) + c + g, h = parseFloat(u) + c + g)), a = _e(P, b[l], f + " " + u, p + " " + h, !1, "0px", a);
        }

        return a;
      },
      prefix: !0,
      formatter: he("0px 0px 0px 0px", !1, !0)
    }), me("backgroundPosition", {
      defaultValue: "0 0",
      parser: function parser(t, e, i, r, n, a) {
        var o,
            l,
            h,
            u,
            f,
            p,
            _ = "background-position",
            d = s || q(t, null),
            m = this.format((d ? c ? d.getPropertyValue(_ + "-x") + " " + d.getPropertyValue(_ + "-y") : d.getPropertyValue(_) : t.currentStyle.backgroundPositionX + " " + t.currentStyle.backgroundPositionY) || "0 0"),
            g = this.format(e);

        if (-1 !== m.indexOf("%") != (-1 !== g.indexOf("%")) && (p = H(t, "backgroundImage").replace(R, ""), p && "none" !== p)) {
          for (o = m.split(" "), l = g.split(" "), I.setAttribute("src", p), h = 2; --h > -1;) {
            m = o[h], u = -1 !== m.indexOf("%"), u !== (-1 !== l[h].indexOf("%")) && (f = 0 === h ? t.offsetWidth - I.width : t.offsetHeight - I.height, o[h] = u ? parseFloat(m) / 100 * f + "px" : 100 * (parseFloat(m) / f) + "%");
          }

          m = o.join(" ");
        }

        return this.parseComplex(t.style, m, g, n, a);
      },
      formatter: ee
    }), me("backgroundSize", {
      defaultValue: "0 0",
      formatter: ee
    }), me("perspective", {
      defaultValue: "0px",
      prefix: !0
    }), me("perspectiveOrigin", {
      defaultValue: "50% 50%",
      prefix: !0
    }), me("transformStyle", {
      prefix: !0
    }), me("backfaceVisibility", {
      prefix: !0
    }), me("userSelect", {
      prefix: !0
    }), me("margin", {
      parser: ue("marginTop,marginRight,marginBottom,marginLeft")
    }), me("padding", {
      parser: ue("paddingTop,paddingRight,paddingBottom,paddingLeft")
    }), me("clip", {
      defaultValue: "rect(0px,0px,0px,0px)",
      parser: function parser(t, e, i, r, n, a) {
        var o, l, h;
        return 9 > c ? (l = t.currentStyle, h = 8 > c ? " " : ",", o = "rect(" + l.clipTop + h + l.clipRight + h + l.clipBottom + h + l.clipLeft + ")", e = this.format(e).split(",").join(h)) : (o = this.format(H(t, this.p, s, !1, this.dflt)), e = this.format(e)), this.parseComplex(t.style, o, e, n, a);
      }
    }), me("textShadow", {
      defaultValue: "0px 0px 0px #999",
      color: !0,
      multi: !0
    }), me("autoRound,strictUnits", {
      parser: function parser(t, e, i, r, s) {
        return s;
      }
    }), me("border", {
      defaultValue: "0px solid #000",
      parser: function parser(t, e, i, r, n, a) {
        return this.parseComplex(t.style, this.format(H(t, "borderTopWidth", s, !1, "0px") + " " + H(t, "borderTopStyle", s, !1, "solid") + " " + H(t, "borderTopColor", s, !1, "#000")), this.format(e), n, a);
      },
      color: !0,
      formatter: function formatter(t) {
        var e = t.split(" ");
        return e[0] + " " + (e[1] || "solid") + " " + (t.match(le) || ["#000"])[0];
      }
    }), me("borderWidth", {
      parser: ue("borderTopWidth,borderRightWidth,borderBottomWidth,borderLeftWidth")
    }), me("float,cssFloat,styleFloat", {
      parser: function parser(t, e, i, r, s) {
        var n = t.style,
            a = "cssFloat" in n ? "cssFloat" : "styleFloat";
        return new pe(n, a, 0, 0, s, -1, i, !1, 0, n[a], e);
      }
    });

    var Ne = function Ne(t) {
      var e,
          i = this.t,
          r = i.filter || H(this.data, "filter") || "",
          s = 0 | this.s + this.c * t;
      100 === s && (-1 === r.indexOf("atrix(") && -1 === r.indexOf("radient(") && -1 === r.indexOf("oader(") ? (i.removeAttribute("filter"), e = !H(this.data, "filter")) : (i.filter = r.replace(w, ""), e = !0)), e || (this.xn1 && (i.filter = r = r || "alpha(opacity=" + s + ")"), -1 === r.indexOf("pacity") ? 0 === s && this.xn1 || (i.filter = r + " alpha(opacity=" + s + ")") : i.filter = r.replace(x, "opacity=" + s));
    };

    me("opacity,alpha,autoAlpha", {
      defaultValue: "1",
      parser: function parser(t, e, i, r, n, a) {
        var o = parseFloat(H(t, "opacity", s, !1, "1")),
            l = t.style,
            h = "autoAlpha" === i;
        return "string" == typeof e && "=" === e.charAt(1) && (e = ("-" === e.charAt(0) ? -1 : 1) * parseFloat(e.substr(2)) + o), h && 1 === o && "hidden" === H(t, "visibility", s) && 0 !== e && (o = 0), Y ? n = new pe(l, "opacity", o, e - o, n) : (n = new pe(l, "opacity", 100 * o, 100 * (e - o), n), n.xn1 = h ? 1 : 0, l.zoom = 1, n.type = 2, n.b = "alpha(opacity=" + n.s + ")", n.e = "alpha(opacity=" + (n.s + n.c) + ")", n.data = t, n.plugin = a, n.setRatio = Ne), h && (n = new pe(l, "visibility", 0, 0, n, -1, null, !1, 0, 0 !== o ? "inherit" : "hidden", 0 === e ? "hidden" : "inherit"), n.xs0 = "inherit", r._overwriteProps.push(n.n), r._overwriteProps.push(i)), n;
      }
    });

    var ze = function ze(t, e) {
      e && (t.removeProperty ? ("ms" === e.substr(0, 2) && (e = "M" + e.substr(1)), t.removeProperty(e.replace(P, "-$1").toLowerCase())) : t.removeAttribute(e));
    },
        Xe = function Xe(t) {
      if (this.t._gsClassPT = this, 1 === t || 0 === t) {
        this.t.setAttribute("class", 0 === t ? this.b : this.e);

        for (var e = this.data, i = this.t.style; e;) {
          e.v ? i[e.p] = e.v : ze(i, e.p), e = e._next;
        }

        1 === t && this.t._gsClassPT === this && (this.t._gsClassPT = null);
      } else this.t.getAttribute("class") !== this.e && this.t.setAttribute("class", this.e);
    };

    me("className", {
      parser: function parser(t, e, r, n, a, o, l) {
        var h,
            u,
            f,
            p,
            _,
            c = t.getAttribute("class") || "",
            d = t.style.cssText;

        if (a = n._classNamePT = new pe(t, r, 0, 0, a, 2), a.setRatio = Xe, a.pr = -11, i = !0, a.b = c, u = Z(t, s), f = t._gsClassPT) {
          for (p = {}, _ = f.data; _;) {
            p[_.p] = 1, _ = _._next;
          }

          f.setRatio(1);
        }

        return t._gsClassPT = a, a.e = "=" !== e.charAt(1) ? e : c.replace(RegExp("\\s*\\b" + e.substr(2) + "\\b"), "") + ("+" === e.charAt(0) ? " " + e.substr(2) : ""), n._tween._duration && (t.setAttribute("class", a.e), h = $(t, u, Z(t), l, p), t.setAttribute("class", c), a.data = h.firstMPT, t.style.cssText = d, a = a.xfirst = n.parse(t, h.difs, a, o)), a;
      }
    });

    var Ie = function Ie(t) {
      if ((1 === t || 0 === t) && this.data._totalTime === this.data._totalDuration && "isFromStart" !== this.data.data) {
        var e,
            i,
            r,
            s,
            n = this.t.style,
            a = o.transform.parse;
        if ("all" === this.e) n.cssText = "", s = !0;else for (e = this.e.split(" ").join("").split(","), r = e.length; --r > -1;) {
          i = e[r], o[i] && (o[i].parse === a ? s = !0 : i = "transformOrigin" === i ? we : o[i].p), ze(n, i);
        }
        s && (ze(n, xe), this.t._gsTransform && delete this.t._gsTransform);
      }
    };

    for (me("clearProps", {
      parser: function parser(t, e, r, s, n) {
        return n = new pe(t, r, 0, 0, n, 2), n.setRatio = Ie, n.e = e, n.pr = -10, n.data = s._tween, i = !0, n;
      }
    }), l = "bezier,throwProps,physicsProps,physics2D".split(","), ce = l.length; ce--;) {
      ge(l[ce]);
    }

    l = a.prototype, l._firstPT = null, l._onInitTween = function (t, e, o) {
      if (!t.nodeType) return !1;
      this._target = t, this._tween = o, this._vars = e, h = e.autoRound, i = !1, r = e.suffixMap || a.suffixMap, s = q(t, ""), n = this._overwriteProps;
      var l,
          p,
          c,
          d,
          m,
          g,
          v,
          y,
          x,
          w = t.style;

      if (u && "" === w.zIndex && (l = H(t, "zIndex", s), ("auto" === l || "" === l) && this._addLazySet(w, "zIndex", 0)), "string" == typeof e && (d = w.cssText, l = Z(t, s), w.cssText = d + ";" + e, l = $(t, l, Z(t)).difs, !Y && T.test(e) && (l.opacity = parseFloat(RegExp.$1)), e = l, w.cssText = d), this._firstPT = p = this.parse(t, e, null), this._transformType) {
        for (x = 3 === this._transformType, xe ? f && (u = !0, "" === w.zIndex && (v = H(t, "zIndex", s), ("auto" === v || "" === v) && this._addLazySet(w, "zIndex", 0)), _ && this._addLazySet(w, "WebkitBackfaceVisibility", this._vars.WebkitBackfaceVisibility || (x ? "visible" : "hidden"))) : w.zoom = 1, c = p; c && c._next;) {
          c = c._next;
        }

        y = new pe(t, "transform", 0, 0, null, 2), this._linkCSSP(y, null, c), y.setRatio = x && be ? Me : xe ? Le : De, y.data = this._transform || Ae(t, s, !0), n.pop();
      }

      if (i) {
        for (; p;) {
          for (g = p._next, c = d; c && c.pr > p.pr;) {
            c = c._next;
          }

          (p._prev = c ? c._prev : m) ? p._prev._next = p : d = p, (p._next = c) ? c._prev = p : m = p, p = g;
        }

        this._firstPT = d;
      }

      return !0;
    }, l.parse = function (t, e, i, n) {
      var a,
          l,
          u,
          f,
          p,
          _,
          c,
          d,
          m,
          g,
          v = t.style;

      for (a in e) {
        _ = e[a], l = o[a], l ? i = l.parse(t, _, a, this, i, n, e) : (p = H(t, a, s) + "", m = "string" == typeof _, "color" === a || "fill" === a || "stroke" === a || -1 !== a.indexOf("Color") || m && b.test(_) ? (m || (_ = oe(_), _ = (_.length > 3 ? "rgba(" : "rgb(") + _.join(",") + ")"), i = _e(v, a, p, _, !0, "transparent", i, 0, n)) : !m || -1 === _.indexOf(" ") && -1 === _.indexOf(",") ? (u = parseFloat(p), c = u || 0 === u ? p.substr((u + "").length) : "", ("" === p || "auto" === p) && ("width" === a || "height" === a ? (u = te(t, a, s), c = "px") : "left" === a || "top" === a ? (u = Q(t, a, s), c = "px") : (u = "opacity" !== a ? 0 : 1, c = "")), g = m && "=" === _.charAt(1), g ? (f = parseInt(_.charAt(0) + "1", 10), _ = _.substr(2), f *= parseFloat(_), d = _.replace(y, "")) : (f = parseFloat(_), d = m ? _.substr((f + "").length) || "" : ""), "" === d && (d = a in r ? r[a] : c), _ = f || 0 === f ? (g ? f + u : f) + d : e[a], c !== d && "" !== d && (f || 0 === f) && u && (u = G(t, a, u, c), "%" === d ? (u /= G(t, a, 100, "%") / 100, e.strictUnits !== !0 && (p = u + "%")) : "em" === d ? u /= G(t, a, 1, "em") : "px" !== d && (f = G(t, a, f, d), d = "px"), g && (f || 0 === f) && (_ = f + u + d)), g && (f += u), !u && 0 !== u || !f && 0 !== f ? void 0 !== v[a] && (_ || "NaN" != _ + "" && null != _) ? (i = new pe(v, a, f || u || 0, 0, i, -1, a, !1, 0, p, _), i.xs0 = "none" !== _ || "display" !== a && -1 === a.indexOf("Style") ? _ : p) : U("invalid " + a + " tween value: " + e[a]) : (i = new pe(v, a, u, f - u, i, 0, a, h !== !1 && ("px" === d || "zIndex" === a), 0, p, _), i.xs0 = d)) : i = _e(v, a, p, _, !0, null, i, 0, n)), n && i && !i.plugin && (i.plugin = n);
      }

      return i;
    }, l.setRatio = function (t) {
      var e,
          i,
          r,
          s = this._firstPT,
          n = 1e-6;
      if (1 !== t || this._tween._time !== this._tween._duration && 0 !== this._tween._time) {
        if (t || this._tween._time !== this._tween._duration && 0 !== this._tween._time || this._tween._rawPrevTime === -1e-6) for (; s;) {
          if (e = s.c * t + s.s, s.r ? e = Math.round(e) : n > e && e > -n && (e = 0), s.type) {
            if (1 === s.type) {
              if (r = s.l, 2 === r) s.t[s.p] = s.xs0 + e + s.xs1 + s.xn1 + s.xs2;else if (3 === r) s.t[s.p] = s.xs0 + e + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3;else if (4 === r) s.t[s.p] = s.xs0 + e + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3 + s.xn3 + s.xs4;else if (5 === r) s.t[s.p] = s.xs0 + e + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3 + s.xn3 + s.xs4 + s.xn4 + s.xs5;else {
                for (i = s.xs0 + e + s.xs1, r = 1; s.l > r; r++) {
                  i += s["xn" + r] + s["xs" + (r + 1)];
                }

                s.t[s.p] = i;
              }
            } else -1 === s.type ? s.t[s.p] = s.xs0 : s.setRatio && s.setRatio(t);
          } else s.t[s.p] = e + s.xs0;
          s = s._next;
        } else for (; s;) {
          2 !== s.type ? s.t[s.p] = s.b : s.setRatio(t), s = s._next;
        }
      } else for (; s;) {
        2 !== s.type ? s.t[s.p] = s.e : s.setRatio(t), s = s._next;
      }
    }, l._enableTransforms = function (t) {
      this._transform = this._transform || Ae(this._target, s, !0), this._transformType = this._transform.svg && ve || !t && 3 !== this._transformType ? 2 : 3;
    };

    var Ee = function Ee() {
      this.t[this.p] = this.e, this.data._linkCSSP(this, this._next, null, !0);
    };

    l._addLazySet = function (t, e, i) {
      var r = this._firstPT = new pe(t, e, 0, 0, this._firstPT, 2);
      r.e = i, r.setRatio = Ee, r.data = this;
    }, l._linkCSSP = function (t, e, i, r) {
      return t && (e && (e._prev = t), t._next && (t._next._prev = t._prev), t._prev ? t._prev._next = t._next : this._firstPT === t && (this._firstPT = t._next, r = !0), i ? i._next = t : r || null !== this._firstPT || (this._firstPT = t), t._next = e, t._prev = i), t;
    }, l._kill = function (e) {
      var i,
          r,
          s,
          n = e;

      if (e.autoAlpha || e.alpha) {
        n = {};

        for (r in e) {
          n[r] = e[r];
        }

        n.opacity = 1, n.autoAlpha && (n.visibility = 1);
      }

      return e.className && (i = this._classNamePT) && (s = i.xfirst, s && s._prev ? this._linkCSSP(s._prev, i._next, s._prev._prev) : s === this._firstPT && (this._firstPT = i._next), i._next && this._linkCSSP(i._next, i._next._next, s._prev), this._classNamePT = null), t.prototype._kill.call(this, n);
    };

    var Fe = function Fe(t, e, i) {
      var r, s, n, a;
      if (t.slice) for (s = t.length; --s > -1;) {
        Fe(t[s], e, i);
      } else for (r = t.childNodes, s = r.length; --s > -1;) {
        n = r[s], a = n.type, n.style && (e.push(Z(n)), i && i.push(n)), 1 !== a && 9 !== a && 11 !== a || !n.childNodes.length || Fe(n, e, i);
      }
    };

    return a.cascadeTo = function (t, i, r) {
      var s,
          n,
          a,
          o = e.to(t, i, r),
          l = [o],
          h = [],
          u = [],
          f = [],
          p = e._internals.reservedProps;

      for (t = o._targets || o.target, Fe(t, h, f), o.render(i, !0), Fe(t, u), o.render(0, !0), o._enabled(!0), s = f.length; --s > -1;) {
        if (n = $(f[s], h[s], u[s]), n.firstMPT) {
          n = n.difs;

          for (a in r) {
            p[a] && (n[a] = r[a]);
          }

          l.push(e.to(f[s], i, n));
        }
      }

      return l;
    }, t.activate([a]), a;
  }, !0);
}), _gsScope._gsDefine && _gsScope._gsQueue.pop()(), function (t) {
  "use strict";

  var e = function e() {
    return (_gsScope.GreenSockGlobals || _gsScope)[t];
  };

  "function" == typeof define && define.amd ? define(["TweenLite"], e) : "undefined" != typeof module && module.exports && (require("../TweenLite.js"), module.exports = e());
}("CSSPlugin");
/*!
 * VERSION: beta 0.3.3
 * DATE: 2014-10-29
 * UPDATES AND DOCS AT: http://www.greensock.com
 *
 * @license Copyright (c) 2008-2014, GreenSock. All rights reserved.
 * SplitText is a Club GreenSock membership benefit; You must have a valid membership to use
 * this code without violating the terms of use. Visit http://www.greensock.com/club/ to sign up or get more details.
 * This work is subject to the software agreement that was issued with your membership.
 * 
 * @author: Jack Doyle, jack@greensock.com
 */

var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;

(function (t) {
  "use strict";

  var e = t.GreenSockGlobals || t,
      i = function i(t) {
    var i,
        s = t.split("."),
        r = e;

    for (i = 0; s.length > i; i++) {
      r[s[i]] = r = r[s[i]] || {};
    }

    return r;
  },
      s = i("com.greensock.utils"),
      r = function r(t) {
    var e = t.nodeType,
        i = "";

    if (1 === e || 9 === e || 11 === e) {
      if ("string" == typeof t.textContent) return t.textContent;

      for (t = t.firstChild; t; t = t.nextSibling) {
        i += r(t);
      }
    } else if (3 === e || 4 === e) return t.nodeValue;

    return i;
  },
      n = document,
      a = n.defaultView ? n.defaultView.getComputedStyle : function () {},
      o = /([A-Z])/g,
      h = function h(t, e, i, s) {
    var r;
    return (i = i || a(t, null)) ? (t = i.getPropertyValue(e.replace(o, "-$1").toLowerCase()), r = t || i.length ? t : i[e]) : t.currentStyle && (i = t.currentStyle, r = i[e]), s ? r : parseInt(r, 10) || 0;
  },
      l = function l(t) {
    return t.length && t[0] && (t[0].nodeType && t[0].style && !t.nodeType || t[0].length && t[0][0]) ? !0 : !1;
  },
      _ = function _(t) {
    var e,
        i,
        s,
        r = [],
        n = t.length;

    for (e = 0; n > e; e++) {
      if (i = t[e], l(i)) for (s = i.length, s = 0; i.length > s; s++) {
        r.push(i[s]);
      } else r.push(i);
    }

    return r;
  },
      u = ")eefec303079ad17405c",
      c = /(?:<br>|<br\/>|<br \/>)/gi,
      p = n.all && !n.addEventListener,
      f = "<div style='position:relative;display:inline-block;" + (p ? "*display:inline;*zoom:1;'" : "'"),
      m = function m(t) {
    t = t || "";
    var e = -1 !== t.indexOf("++"),
        i = 1;
    return e && (t = t.split("++").join("")), function () {
      return f + (t ? " class='" + t + (e ? i++ : "") + "'>" : ">");
    };
  },
      d = s.SplitText = e.SplitText = function (t, e) {
    if ("string" == typeof t && (t = d.selector(t)), !t) throw "cannot split a null element.";
    this.elements = l(t) ? _(t) : [t], this.chars = [], this.words = [], this.lines = [], this._originals = [], this.vars = e || {}, this.split(e);
  },
      g = function g(t, e, i) {
    var s = t.nodeType;
    if (1 === s || 9 === s || 11 === s) for (t = t.firstChild; t; t = t.nextSibling) {
      g(t, e, i);
    } else (3 === s || 4 === s) && (t.nodeValue = t.nodeValue.split(e).join(i));
  },
      v = function v(t, e) {
    for (var i = e.length; --i > -1;) {
      t.push(e[i]);
    }
  },
      y = function y(t, e, i, s, o) {
    c.test(t.innerHTML) && (t.innerHTML = t.innerHTML.replace(c, u));

    var l,
        _,
        p,
        f,
        d,
        y,
        T,
        w,
        b,
        x,
        P,
        S,
        C,
        k,
        R = r(t),
        A = e.type || e.split || "chars,words,lines",
        O = -1 !== A.indexOf("lines") ? [] : null,
        D = -1 !== A.indexOf("words"),
        M = -1 !== A.indexOf("chars"),
        L = "absolute" === e.position || e.absolute === !0,
        z = L ? "&#173; " : " ",
        I = -999,
        E = a(t),
        N = h(t, "paddingLeft", E),
        F = h(t, "borderBottomWidth", E) + h(t, "borderTopWidth", E),
        X = h(t, "borderLeftWidth", E) + h(t, "borderRightWidth", E),
        U = h(t, "paddingTop", E) + h(t, "paddingBottom", E),
        B = h(t, "paddingLeft", E) + h(t, "paddingRight", E),
        j = h(t, "textAlign", E, !0),
        Y = t.clientHeight,
        q = t.clientWidth,
        G = "</div>",
        V = m(e.wordsClass),
        Q = m(e.charsClass),
        W = -1 !== (e.linesClass || "").indexOf("++"),
        H = e.linesClass,
        Z = -1 !== R.indexOf("<"),
        $ = !0,
        K = [],
        J = [],
        te = [];

    for (W && (H = H.split("++").join("")), Z && (R = R.split("<").join("{{LT}}")), l = R.length, f = V(), d = 0; l > d; d++) {
      if (T = R.charAt(d), ")" === T && R.substr(d, 20) === u) f += ($ ? G : "") + "<BR/>", $ = !1, d !== l - 20 && R.substr(d + 20, 20) !== u && (f += " " + V(), $ = !0), d += 19;else if (" " === T && " " !== R.charAt(d - 1) && d !== l - 1 && R.substr(d - 20, 20) !== u) {
        for (f += $ ? G : "", $ = !1; " " === R.charAt(d + 1);) {
          f += z, d++;
        }

        (")" !== R.charAt(d + 1) || R.substr(d + 1, 20) !== u) && (f += z + V(), $ = !0);
      } else f += M && " " !== T ? Q() + T + "</div>" : T;
    }

    for (t.innerHTML = f + ($ ? G : ""), Z && g(t, "{{LT}}", "<"), y = t.getElementsByTagName("*"), l = y.length, w = [], d = 0; l > d; d++) {
      w[d] = y[d];
    }

    if (O || L) for (d = 0; l > d; d++) {
      b = w[d], p = b.parentNode === t, (p || L || M && !D) && (x = b.offsetTop, O && p && x !== I && "BR" !== b.nodeName && (_ = [], O.push(_), I = x), L && (b._x = b.offsetLeft, b._y = x, b._w = b.offsetWidth, b._h = b.offsetHeight), O && (D !== p && M || (_.push(b), b._x -= N), p && d && (w[d - 1]._wordEnd = !0), "BR" === b.nodeName && b.nextSibling && "BR" === b.nextSibling.nodeName && O.push([])));
    }

    for (d = 0; l > d; d++) {
      b = w[d], p = b.parentNode === t, "BR" !== b.nodeName ? (L && (S = b.style, D || p || (b._x += b.parentNode._x, b._y += b.parentNode._y), S.left = b._x + "px", S.top = b._y + "px", S.position = "absolute", S.display = "block", S.width = b._w + 1 + "px", S.height = b._h + "px"), D ? p && "" !== b.innerHTML ? J.push(b) : M && K.push(b) : p ? (t.removeChild(b), w.splice(d--, 1), l--) : !p && M && (x = !O && !L && b.nextSibling, t.appendChild(b), x || t.appendChild(n.createTextNode(" ")), K.push(b))) : O || L ? (t.removeChild(b), w.splice(d--, 1), l--) : D || t.appendChild(b);
    }

    if (O) {
      for (L && (P = n.createElement("div"), t.appendChild(P), C = P.offsetWidth + "px", x = P.offsetParent === t ? 0 : t.offsetLeft, t.removeChild(P)), S = t.style.cssText, t.style.cssText = "display:none;"; t.firstChild;) {
        t.removeChild(t.firstChild);
      }

      for (k = !L || !D && !M, d = 0; O.length > d; d++) {
        for (_ = O[d], P = n.createElement("div"), P.style.cssText = "display:block;text-align:" + j + ";position:" + (L ? "absolute;" : "relative;"), H && (P.className = H + (W ? d + 1 : "")), te.push(P), l = _.length, y = 0; l > y; y++) {
          "BR" !== _[y].nodeName && (b = _[y], P.appendChild(b), k && (b._wordEnd || D) && P.appendChild(n.createTextNode(" ")), L && (0 === y && (P.style.top = b._y + "px", P.style.left = N + x + "px"), b.style.top = "0px", x && (b.style.left = b._x - x + "px")));
        }

        0 === l && (P.innerHTML = "&nbsp;"), D || M || (P.innerHTML = r(P).split(String.fromCharCode(160)).join(" ")), L && (P.style.width = C, P.style.height = b._h + "px"), t.appendChild(P);
      }

      t.style.cssText = S;
    }

    L && (Y > t.clientHeight && (t.style.height = Y - U + "px", Y > t.clientHeight && (t.style.height = Y + F + "px")), q > t.clientWidth && (t.style.width = q - B + "px", q > t.clientWidth && (t.style.width = q + X + "px"))), v(i, K), v(s, J), v(o, te);
  },
      T = d.prototype;

  T.split = function (t) {
    this.isSplit && this.revert(), this.vars = t || this.vars, this._originals.length = this.chars.length = this.words.length = this.lines.length = 0;

    for (var e = this.elements.length; --e > -1;) {
      this._originals[e] = this.elements[e].innerHTML, y(this.elements[e], this.vars, this.chars, this.words, this.lines);
    }

    return this.chars.reverse(), this.words.reverse(), this.lines.reverse(), this.isSplit = !0, this;
  }, T.revert = function () {
    if (!this._originals) throw "revert() call wasn't scoped properly.";

    for (var t = this._originals.length; --t > -1;) {
      this.elements[t].innerHTML = this._originals[t];
    }

    return this.chars = [], this.words = [], this.lines = [], this.isSplit = !1, this;
  }, d.selector = t.$ || t.jQuery || function (e) {
    var i = t.$ || t.jQuery;
    return i ? (d.selector = i, i(e)) : "undefined" == typeof document ? e : document.querySelectorAll ? document.querySelectorAll(e) : document.getElementById("#" === e.charAt(0) ? e.substr(1) : e);
  }, d.version = "0.3.3";
})(_gsScope), function (t) {
  "use strict";

  var e = function e() {
    return (_gsScope.GreenSockGlobals || _gsScope)[t];
  };

  "function" == typeof define && define.amd ? define(["TweenLite"], e) : "undefined" != typeof module && module.exports && (module.exports = e());
}("SplitText");

try {
  window.GreenSockGlobals = null;
  window._gsQueue = null;
  window._gsDefine = null;
  delete window.GreenSockGlobals;
  delete window._gsQueue;
  delete window._gsDefine;
} catch (e) {}

try {
  window.GreenSockGlobals = oldgs;
  window._gsQueue = oldgs_queue;
} catch (e) {}

if (window.tplogs == true) try {
  console.groupEnd();
} catch (e) {}

(function (e, t) {
  e.waitForImages = {
    hasImageProperties: ["backgroundImage", "listStyleImage", "borderImage", "borderCornerImage"]
  };

  e.expr[":"].uncached = function (t) {
    var n = document.createElement("img");
    n.src = t.src;
    return e(t).is('img[src!=""]') && !n.complete;
  };

  e.fn.waitForImages = function (t, n, r) {
    if (e.isPlainObject(arguments[0])) {
      n = t.each;
      r = t.waitForAll;
      t = t.finished;
    }

    t = t || e.noop;
    n = n || e.noop;
    r = !!r;

    if (!e.isFunction(t) || !e.isFunction(n)) {
      throw new TypeError("An invalid callback was supplied.");
    }

    return this.each(function () {
      var i = e(this),
          s = [];

      if (r) {
        var o = e.waitForImages.hasImageProperties || [],
            u = /url\((['"]?)(.*?)\1\)/g;
        i.find("*").each(function () {
          var t = e(this);

          if (t.is("img:uncached")) {
            s.push({
              src: t.attr("src"),
              element: t[0]
            });
          }

          e.each(o, function (e, n) {
            var r = t.css(n);

            if (!r) {
              return true;
            }

            var i;

            while (i = u.exec(r)) {
              s.push({
                src: i[2],
                element: t[0]
              });
            }
          });
        });
      } else {
        i.find("img:uncached").each(function () {
          s.push({
            src: this.src,
            element: this
          });
        });
      }

      var f = s.length,
          l = 0;

      if (f == 0) {
        t.call(i[0]);
      }

      e.each(s, function (r, s) {
        var o = new Image();
        e(o).bind("load error", function (e) {
          l++;
          n.call(s.element, l, f, e.type == "load");

          if (l == f) {
            t.call(i[0]);
            return false;
          }
        });
        o.src = s.src;
      });
    });
  };
})(jQuery);
/**************************************************************************
 * jquery.themepunch.revolution.js - jQuery Plugin for Revolution Slider
 * @version: 4.6.4 (26.11.2014)
 * @requires jQuery v1.7 or later (tested on 1.9)
 * @author ThemePunch
**************************************************************************/


function revslider_showDoubleJqueryError(e) {
  var t = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
  t += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
  t += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
  t += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
  t = "<span style='font-size:16px;color:#BC0C06;'>" + t + "</span>";
  jQuery(e).show().html(t);
}

(function (e, t) {
  function n() {
    var e = false;

    if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/iPad/i)) {
      if (navigator.userAgent.match(/OS 4_\d like Mac OS X/i)) {
        e = true;
      }
    } else {
      e = false;
    }

    return e;
  }

  function r(r, i) {
    if (r == t) return false;

    if (r.data("aimg") != t) {
      if (r.data("aie8") == "enabled" && a(8) || r.data("amobile") == "enabled" && J()) r.html('<img class="tp-slider-alternative-image" src="' + r.data("aimg") + '">');
    }

    if (i.navigationStyle == "preview1" || i.navigationStyle == "preview3" || i.navigationStyle == "preview4") {
      i.soloArrowLeftHalign = "left";
      i.soloArrowLeftValign = "center";
      i.soloArrowLeftHOffset = 0;
      i.soloArrowLeftVOffset = 0;
      i.soloArrowRightHalign = "right";
      i.soloArrowRightValign = "center";
      i.soloArrowRightHOffset = 0;
      i.soloArrowRightVOffset = 0;
      i.navigationArrows = "solo";
    }

    if (i.simplifyAll == "on" && (a(8) || n())) {
      r.find(".tp-caption").each(function () {
        var t = e(this);
        t.removeClass("customin").removeClass("customout").addClass("fadein").addClass("fadeout");
        t.data("splitin", "");
        t.data("speed", 400);
      });
      r.find(">ul>li").each(function () {
        var t = e(this);
        t.data("transition", "fade");
        t.data("masterspeed", 500);
        t.data("slotamount", 1);
        var n = t.find(">img").first();
        n.data("kenburns", "off");
      });
    }

    i.desktop = !navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i);
    if (i.fullWidth != "on" && i.fullScreen != "on") i.autoHeight = "off";
    if (i.fullScreen == "on") i.autoHeight = "on";
    if (i.fullWidth != "on" && i.fullScreen != "on") forceFulWidth = "off";
    if (i.fullWidth == "on" && i.autoHeight == "off") r.css({
      maxHeight: i.startheight + "px"
    });
    if (J() && i.hideThumbsOnMobile == "on" && i.navigationType == "thumb") i.navigationType = "none";
    if (J() && i.hideBulletsOnMobile == "on" && i.navigationType == "bullet") i.navigationType = "none";
    if (J() && i.hideBulletsOnMobile == "on" && i.navigationType == "both") i.navigationType = "none";
    if (J() && i.hideArrowsOnMobile == "on") i.navigationArrows = "none";

    if (i.forceFullWidth == "on" && r.closest(".forcefullwidth_wrapper_tp_banner").length == 0) {
      var f = r.parent().offset().left;
      var v = r.parent().css("marginBottom");
      var m = r.parent().css("marginTop");
      if (v == t) v = 0;
      if (m == t) m = 0;
      r.parent().wrap('<div style="position:relative;width:100%;height:auto;margin-top:' + m + ";margin-bottom:" + v + '" class="forcefullwidth_wrapper_tp_banner"></div>');
      r.closest(".forcefullwidth_wrapper_tp_banner").append('<div class="tp-fullwidth-forcer" style="width:100%;height:' + r.height() + 'px"></div>');
      r.css({
        backgroundColor: r.parent().css("backgroundColor"),
        backgroundImage: r.parent().css("backgroundImage")
      });
      r.parent().css({
        left: 0 - f + "px",
        position: "absolute",
        width: e(window).width()
      });
      i.width = e(window).width();
    }

    try {
      if (i.hideThumbsUnderResolution > e(window).width() && i.hideThumbsUnderResolution != 0) {
        r.parent().find(".tp-bullets.tp-thumbs").css({
          display: "none"
        });
      } else {
        r.parent().find(".tp-bullets.tp-thumbs").css({
          display: "block"
        });
      }
    } catch (g) {}

    if (!r.hasClass("revslider-initialised")) {
      r.addClass("revslider-initialised");
      if (r.attr("id") == t) r.attr("id", "revslider-" + Math.round(Math.random() * 1e3 + 5));
      i.firefox13 = false;
      i.ie = !e.support.opacity;
      i.ie9 = document.documentMode == 9;
      i.origcd = i.delay;
      var b = e.fn.jquery.split("."),
          w = parseFloat(b[0]),
          E = parseFloat(b[1]),
          S = parseFloat(b[2] || "0");

      if (w == 1 && E < 7) {
        r.html('<div style="text-align:center; padding:40px 0px; font-size:20px; color:#992222;"> The Current Version of jQuery:' + b + " <br>Please update your jQuery Version to min. 1.7 in Case you wish to use the Revolution Slider Plugin</div>");
      }

      if (w > 1) i.ie = false;
      if (!e.support.transition) e.fn.transition = e.fn.animate;
      r.find(".caption").each(function () {
        e(this).addClass("tp-caption");
      });

      if (J()) {
        r.find(".tp-caption").each(function () {
          var t = e(this);
          if (t.data("autoplayonlyfirsttime") == true || t.data("autoplayonlyfirsttime") == "true") t.data("autoplayonlyfirsttime", "false");
          if (t.data("autoplay") == true || t.data("autoplay") == "true") t.data("autoplay", false);
        });
      }

      var x = 0;
      var T = 0;
      var C = 0;
      var k = "http";

      if (location.protocol === "https:") {
        k = "https";
      }

      r.find(".tp-caption").each(function (n) {
        try {
          if ((e(this).data("ytid") != t || e(this).find("iframe").attr("src").toLowerCase().indexOf("youtube") > 0) && x == 0) {
            x = 1;
            var r = document.createElement("script");
            var i = "https";
            r.src = i + "://www.youtube.com/iframe_api";
            var s = document.getElementsByTagName("script")[0];
            var o = true;
            e("head").find("*").each(function () {
              if (e(this).attr("src") == i + "://www.youtube.com/iframe_api") o = false;
            });

            if (o) {
              s.parentNode.insertBefore(r, s);
            }
          }
        } catch (u) {}

        try {
          if ((e(this).data("vimeoid") != t || e(this).find("iframe").attr("src").toLowerCase().indexOf("vimeo") > 0) && T == 0) {
            T = 1;
            var a = document.createElement("script");
            a.src = k + "://a.vimeocdn.com/js/froogaloop2.min.js";
            var s = document.getElementsByTagName("script")[0];
            var o = true;
            e("head").find("*").each(function () {
              if (e(this).attr("src") == k + "://a.vimeocdn.com/js/froogaloop2.min.js") o = false;
            });
            if (o) s.parentNode.insertBefore(a, s);
          }
        } catch (u) {}

        try {
          if (e(this).data("videomp4") != t || e(this).data("videowebm") != t) {}
        } catch (u) {}
      });
      r.find(".tp-caption video").each(function (t) {
        e(this).removeClass("video-js").removeClass("vjs-default-skin");
        e(this).attr("preload", "");
        e(this).css({
          display: "none"
        });
      });
      r.find(">ul:first-child >li").each(function () {
        var t = e(this);
        t.data("origindex", t.index());
      });

      if (i.shuffle == "on") {
        var L = new Object(),
            A = r.find(">ul:first-child >li:first-child");
        L.fstransition = A.data("fstransition");
        L.fsmasterspeed = A.data("fsmasterspeed");
        L.fsslotamount = A.data("fsslotamount");

        for (var O = 0; O < r.find(">ul:first-child >li").length; O++) {
          var M = Math.round(Math.random() * r.find(">ul:first-child >li").length);
          r.find(">ul:first-child >li:eq(" + M + ")").prependTo(r.find(">ul:first-child"));
        }

        var _ = r.find(">ul:first-child >li:first-child");

        _.data("fstransition", L.fstransition);

        _.data("fsmasterspeed", L.fsmasterspeed);

        _.data("fsslotamount", L.fsslotamount);
      }

      i.slots = 4;
      i.act = -1;
      i.next = 0;
      if (i.startWithSlide != t) i.next = i.startWithSlide;
      var D = o("#")[0];

      if (D.length < 9) {
        if (D.split("slide").length > 1) {
          var P = parseInt(D.split("slide")[1], 0);
          if (P < 1) P = 1;
          if (P > r.find(">ul:first >li").length) P = r.find(">ul:first >li").length;
          i.next = P - 1;
        }
      }

      i.firststart = 1;
      if (i.navigationHOffset == t) i.navOffsetHorizontal = 0;
      if (i.navigationVOffset == t) i.navOffsetVertical = 0;
      r.append('<div class="tp-loader ' + i.spinner + '">' + '<div class="dot1"></div>' + '<div class="dot2"></div>' + '<div class="bounce1"></div>' + '<div class="bounce2"></div>' + '<div class="bounce3"></div>' + "</div>");
      if (r.find(".tp-bannertimer").length == 0) r.append('<div class="tp-bannertimer" style="visibility:hidden"></div>');
      var H = r.find(".tp-bannertimer");

      if (H.length > 0) {
        H.css({
          width: "0%"
        });
      }

      r.addClass("tp-simpleresponsive");
      i.container = r;
      i.slideamount = r.find(">ul:first >li").length;
      if (r.height() == 0) r.height(i.startheight);
      if (i.startwidth == t || i.startwidth == 0) i.startwidth = r.width();
      if (i.startheight == t || i.startheight == 0) i.startheight = r.height();
      i.width = r.width();
      i.height = r.height();
      i.bw = i.startwidth / r.width();
      i.bh = i.startheight / r.height();

      if (i.width != i.startwidth) {
        i.height = Math.round(i.startheight * (i.width / i.startwidth));
        r.height(i.height);
      }

      if (i.shadow != 0) {
        r.parent().append('<div class="tp-bannershadow tp-shadow' + i.shadow + '"></div>');
        var f = 0;
        if (i.forceFullWidth == "on") f = 0 - i.container.parent().offset().left;
        r.parent().find(".tp-bannershadow").css({
          width: i.width,
          left: f
        });
      }

      r.find("ul").css({
        display: "none"
      });
      var B = r;
      r.find("ul").css({
        display: "block"
      });
      y(r, i);
      if (i.parallax != "off") et(r, i);
      if (i.slideamount > 1) l(r, i);
      if (i.slideamount > 1 && i.navigationType == "thumb") nt(r, i);
      if (i.slideamount > 1) c(r, i);
      if (i.keyboardNavigation == "on") h(r, i);
      p(r, i);
      if (i.hideThumbs > 0) d(r, i);
      setTimeout(function () {
        N(r, i);
      }, i.startDelay);
      i.startDelay = 0;
      if (i.slideamount > 1) $(r, i);
      setTimeout(function () {
        r.trigger("revolution.slide.onloaded");
      }, 500);
      e("body").data("rs-fullScreenMode", false);
      e(window).on("mozfullscreenchange webkitfullscreenchange fullscreenchange", function () {
        e("body").data("rs-fullScreenMode", !e("body").data("rs-fullScreenMode"));

        if (e("body").data("rs-fullScreenMode")) {
          setTimeout(function () {
            e(window).trigger("resize");
          }, 200);
        }
      });
      var j = "resize.revslider-" + r.attr("id");
      e(window).on(j, function () {
        if (r == t) return false;
        if (e("body").find(r) != 0) if (i.forceFullWidth == "on") {
          var n = i.container.closest(".forcefullwidth_wrapper_tp_banner").offset().left;
          i.container.parent().css({
            left: 0 - n + "px",
            width: e(window).width()
          });
        }

        if (r.outerWidth(true) != i.width || r.is(":hidden")) {
          u(r, i);
        }
      });

      try {
        if (i.hideThumbsUnderResoluition != 0 && i.navigationType == "thumb") {
          if (i.hideThumbsUnderResoluition > e(window).width()) e(".tp-bullets").css({
            display: "none"
          });else e(".tp-bullets").css({
            display: "block"
          });
        }
      } catch (g) {}

      r.find(".tp-scrollbelowslider").on("click", function () {
        var t = 0;

        try {
          t = e("body").find(i.fullScreenOffsetContainer).height();
        } catch (n) {}

        try {
          t = t - parseInt(e(this).data("scrolloffset"), 0);
        } catch (n) {}

        e("body,html").animate({
          scrollTop: r.offset().top + r.find(">ul >li").height() - t + "px"
        }, {
          duration: 400
        });
      });
      var F = r.parent();

      if (e(window).width() < i.hideSliderAtLimit) {
        r.trigger("stoptimer");
        if (F.css("display") != "none") F.data("olddisplay", F.css("display"));
        F.css({
          display: "none"
        });
      }

      s(r, i);
    }
  }

  e.fn.extend({
    revolution: function revolution(n) {
      var i = {
        delay: 9e3,
        startheight: 500,
        startwidth: 960,
        fullScreenAlignForce: "off",
        autoHeight: "off",
        hideTimerBar: "off",
        hideThumbs: 200,
        hideNavDelayOnMobile: 1500,
        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 3,
        navigationType: "bullet",
        navigationArrows: "solo",
        navigationInGrid: "off",
        hideThumbsOnMobile: "off",
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResoluition: 0,
        navigationStyle: "round",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        keyboardNavigation: "on",
        touchenabled: "on",
        onHoverStop: "on",
        stopAtSlide: -1,
        stopAfterLoops: -1,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLimit: 0,
        hideSliderAtLimit: 0,
        shadow: 0,
        fullWidth: "off",
        fullScreen: "off",
        minFullScreenHeight: 0,
        fullScreenOffsetContainer: "",
        fullScreenOffset: "0",
        dottedOverlay: "none",
        forceFullWidth: "off",
        spinner: "spinner0",
        swipe_treshold: 75,
        swipe_min_touches: 1,
        drag_block_vertical: false,
        isJoomla: false,
        parallax: "off",
        parallaxLevels: [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85],
        parallaxBgFreeze: "off",
        parallaxOpacity: "on",
        parallaxDisableOnMobile: "off",
        panZoomDisableOnMobile: "off",
        simplifyAll: "on",
        minHeight: 0,
        nextSlideOnWindowFocus: "off",
        startDelay: 0
      };
      n = e.extend({}, i, n);
      return this.each(function () {
        if (window.tplogs == true) try {
          console.groupCollapsed("Slider Revolution 4.6.3 Initialisation on " + e(this).attr("id"));
          console.groupCollapsed("Used Options:");
          console.info(n);
          console.groupEnd();
          console.groupCollapsed("Tween Engine:");
        } catch (i) {}

        if (punchgs.TweenLite == t) {
          if (window.tplogs == true) try {
            console.error("GreenSock Engine Does not Exist!");
          } catch (i) {}
          return false;
        }

        punchgs.force3D = true;
        if (window.tplogs == true) try {
          console.info("GreenSock Engine Version in Slider Revolution:" + punchgs.TweenLite.version);
        } catch (i) {}

        if (n.simplifyAll == "on") {} else {
          punchgs.TweenLite.lagSmoothing(1e3, 16);
          punchgs.force3D = "true";
        }

        if (window.tplogs == true) try {
          console.groupEnd();
          console.groupEnd();
        } catch (i) {}
        r(e(this), n);
      });
    },
    revscroll: function revscroll(n) {
      return this.each(function () {
        var r = e(this);
        if (r != t && r.length > 0 && e("body").find("#" + r.attr("id")).length > 0) e("body,html").animate({
          scrollTop: r.offset().top + r.find(">ul >li").height() - n + "px"
        }, {
          duration: 400
        });
      });
    },
    revredraw: function revredraw(n) {
      return this.each(function () {
        var n = e(this);

        if (n != t && n.length > 0 && e("body").find("#" + n.attr("id")).length > 0) {
          var r = n.parent().find(".tp-bannertimer");
          var i = r.data("opt");
          u(n, i);
        }
      });
    },
    revkill: function revkill(n) {
      var r = this,
          i = e(this);

      if (i != t && i.length > 0 && e("body").find("#" + i.attr("id")).length > 0) {
        i.data("conthover", 1);
        i.data("conthover-changed", 1);
        i.trigger("revolution.slide.onpause");
        var s = i.parent().find(".tp-bannertimer");
        var o = s.data("opt");
        o.bannertimeronpause = true;
        i.trigger("stoptimer");
        punchgs.TweenLite.killTweensOf(i.find("*"), false);
        punchgs.TweenLite.killTweensOf(i, false);
        i.unbind("hover, mouseover, mouseenter,mouseleave, resize");
        var u = "resize.revslider-" + i.attr("id");
        e(window).off(u);
        i.find("*").each(function () {
          var n = e(this);
          n.unbind("on, hover, mouseenter,mouseleave,mouseover, resize,restarttimer, stoptimer");
          n.off("on, hover, mouseenter,mouseleave,mouseover, resize");
          n.data("mySplitText", null);
          n.data("ctl", null);
          if (n.data("tween") != t) n.data("tween").kill();
          if (n.data("kenburn") != t) n.data("kenburn").kill();
          n.remove();
          n.empty();
          n = null;
        });
        punchgs.TweenLite.killTweensOf(i.find("*"), false);
        punchgs.TweenLite.killTweensOf(i, false);
        s.remove();

        try {
          i.closest(".forcefullwidth_wrapper_tp_banner").remove();
        } catch (a) {}

        try {
          i.closest(".rev_slider_wrapper").remove();
        } catch (a) {}

        try {
          i.remove();
        } catch (a) {}

        i.empty();
        i.html();
        i = null;
        o = null;
        delete r.container;
        delete r.opt;
        return true;
      } else {
        return false;
      }
    },
    revpause: function revpause(n) {
      return this.each(function () {
        var n = e(this);

        if (n != t && n.length > 0 && e("body").find("#" + n.attr("id")).length > 0) {
          n.data("conthover", 1);
          n.data("conthover-changed", 1);
          n.trigger("revolution.slide.onpause");
          var r = n.parent().find(".tp-bannertimer");
          var i = r.data("opt");
          i.bannertimeronpause = true;
          n.trigger("stoptimer");
        }
      });
    },
    revresume: function revresume(n) {
      return this.each(function () {
        var n = e(this);

        if (n != t && n.length > 0 && e("body").find("#" + n.attr("id")).length > 0) {
          n.data("conthover", 0);
          n.data("conthover-changed", 1);
          n.trigger("revolution.slide.onresume");
          var r = n.parent().find(".tp-bannertimer");
          var i = r.data("opt");
          i.bannertimeronpause = false;
          n.trigger("starttimer");
        }
      });
    },
    revnext: function revnext(n) {
      return this.each(function () {
        var n = e(this);
        if (n != t && n.length > 0 && e("body").find("#" + n.attr("id")).length > 0) n.parent().find(".tp-rightarrow").click();
      });
    },
    revprev: function revprev(n) {
      return this.each(function () {
        var n = e(this);
        if (n != t && n.length > 0 && e("body").find("#" + n.attr("id")).length > 0) n.parent().find(".tp-leftarrow").click();
      });
    },
    revmaxslide: function revmaxslide(t) {
      return e(this).find(">ul:first-child >li").length;
    },
    revcurrentslide: function revcurrentslide(n) {
      var r = e(this);

      if (r != t && r.length > 0 && e("body").find("#" + r.attr("id")).length > 0) {
        var i = r.parent().find(".tp-bannertimer");
        var s = i.data("opt");
        return s.act;
      }
    },
    revlastslide: function revlastslide(n) {
      var r = e(this);

      if (r != t && r.length > 0 && e("body").find("#" + r.attr("id")).length > 0) {
        var i = r.parent().find(".tp-bannertimer");
        var s = i.data("opt");
        return s.lastslide;
      }
    },
    revshowslide: function revshowslide(n) {
      return this.each(function () {
        var r = e(this);

        if (r != t && r.length > 0 && e("body").find("#" + r.attr("id")).length > 0) {
          r.data("showus", n);
          r.parent().find(".tp-rightarrow").click();
        }
      });
    }
  });

  var i = function () {
    var e,
        t,
        n = {
      hidden: "visibilitychange",
      webkitHidden: "webkitvisibilitychange",
      mozHidden: "mozvisibilitychange",
      msHidden: "msvisibilitychange"
    };

    for (e in n) {
      if (e in document) {
        t = n[e];
        break;
      }
    }

    return function (n) {
      if (n) document.addEventListener(t, n);
      return !document[e];
    };
  }();

  var s = function s(n, r) {
    var i = document.documentMode === t,
        s = window.chrome;

    if (i && !s) {
      e(window).on("focusin", function () {
        if (n == t) return false;
        setTimeout(function () {
          if (r.nextSlideOnWindowFocus == "on") n.revnext();
          n.revredraw();
        }, 300);
      }).on("focusout", function () {});
    } else {
      if (window.addEventListener) {
        window.addEventListener("focus", function (e) {
          if (n == t) return false;
          setTimeout(function () {
            if (r.nextSlideOnWindowFocus == "on") n.revnext();
            n.revredraw();
          }, 300);
        }, false);
        window.addEventListener("blur", function (e) {}, false);
      } else {
        window.attachEvent("focus", function (e) {
          setTimeout(function () {
            if (n == t) return false;
            if (r.nextSlideOnWindowFocus == "on") n.revnext();
            n.revredraw();
          }, 300);
        });
        window.attachEvent("blur", function (e) {});
      }
    }
  };

  var o = function o(e) {
    var t = [],
        n;
    var r = window.location.href.slice(window.location.href.indexOf(e) + 1).split("_");

    for (var i = 0; i < r.length; i++) {
      r[i] = r[i].replace("%3D", "=");
      n = r[i].split("=");
      t.push(n[0]);
      t[n[0]] = n[1];
    }

    return t;
  };

  var u = function u(n, r) {
    if (n == t) return false;

    try {
      if (r.hideThumbsUnderResoluition != 0 && r.navigationType == "thumb") {
        if (r.hideThumbsUnderResoluition > e(window).width()) e(".tp-bullets").css({
          display: "none"
        });else e(".tp-bullets").css({
          display: "block"
        });
      }
    } catch (i) {}

    n.find(".defaultimg").each(function (t) {
      g(e(this), r);
    });
    var s = n.parent();

    if (e(window).width() < r.hideSliderAtLimit) {
      n.trigger("stoptimer");
      if (s.css("display") != "none") s.data("olddisplay", s.css("display"));
      s.css({
        display: "none"
      });
    } else {
      if (n.is(":hidden")) {
        if (s.data("olddisplay") != t && s.data("olddisplay") != "undefined" && s.data("olddisplay") != "none") s.css({
          display: s.data("olddisplay")
        });else s.css({
          display: "block"
        });
        n.trigger("restarttimer");
        setTimeout(function () {
          u(n, r);
        }, 150);
      }
    }

    var o = 0;
    if (r.forceFullWidth == "on") o = 0 - r.container.parent().offset().left;

    try {
      n.parent().find(".tp-bannershadow").css({
        width: r.width,
        left: o
      });
    } catch (i) {}

    var a = n.find(">ul >li:eq(" + r.act + ") .slotholder");
    var f = n.find(">ul >li:eq(" + r.next + ") .slotholder");
    E(n, r, n);
    punchgs.TweenLite.set(f.find(".defaultimg"), {
      opacity: 0
    });
    a.find(".defaultimg").css({
      opacity: 1
    });
    f.find(".defaultimg").each(function () {
      var i = e(this);

      if (r.panZoomDisableOnMobile == "on") {} else {
        if (i.data("kenburn") != t) {
          i.data("kenburn").restart();
          Q(n, r, true);
        }
      }
    });
    var l = n.find(">ul >li:eq(" + r.next + ")");
    var c = n.parent().find(".tparrows");
    if (c.hasClass("preview2")) c.css({
      width: parseInt(c.css("minWidth"), 0)
    });
    j(l, r, true);
    v(n, r);
  };

  var a = function a(t, n) {
    var r = e('<div style="display:none;"/>').appendTo(e("body"));
    r.html("<!--[if " + (n || "") + " IE " + (t || "") + "]><a>&nbsp;</a><![endif]-->");
    var i = r.find("a").length;
    r.remove();
    return i;
  };

  var f = function f(e, t) {
    if (e.next == t.find(">ul >li").length - 1) {
      e.looptogo = e.looptogo - 1;
      if (e.looptogo <= 0) e.stopLoop = "on";
    }

    N(t, e);
  };

  var l = function l(t, n) {
    var r = "hidebullets";
    if (n.hideThumbs == 0) r = "";

    if (n.navigationType == "bullet" || n.navigationType == "both") {
      t.parent().append('<div class="tp-bullets ' + r + " simplebullets " + n.navigationStyle + '"></div>');
    }

    var i = t.parent().find(".tp-bullets");
    t.find(">ul:first >li").each(function (e) {
      var n = t.find(">ul:first >li:eq(" + e + ") img:first").attr("src");
      i.append('<div class="bullet"></div>');
      var r = i.find(".bullet:first");
    });
    i.find(".bullet").each(function (r) {
      var i = e(this);
      if (r == n.slideamount - 1) i.addClass("last");
      if (r == 0) i.addClass("first");
      i.click(function () {
        var e = false,
            r = i.index();
        if (n.navigationArrows == "withbullet" || n.navigationArrows == "nexttobullets") r = i.index() - 1;
        if (r == n.act) e = true;

        if (n.transition == 0 && !e) {
          n.next = r;
          f(n, t);
        }
      });
    });
    i.append('<div class="tpclear"></div>');
    v(t, n);
  };

  var c = function c(e, n) {
    function u(t) {
      e.parent().append('<div style="' + i + '" class="tp-' + t + "arrow " + s + " tparrows " + o + '"><div class="tp-arr-allwrapper"><div class="tp-arr-iwrapper"><div class="tp-arr-imgholder"></div><div class="tp-arr-imgholder2"></div><div class="tp-arr-titleholder"></div><div class="tp-arr-subtitleholder"></div></div></div></div>');
    }

    var r = e.find(".tp-bullets"),
        i = "",
        s = "hidearrows",
        o = n.navigationStyle;
    if (n.hideThumbs == 0) s = "";
    if (n.navigationArrows == "none") i = "visibility:hidden;display:none";
    n.soloArrowStyle = "default" + " " + n.navigationStyle;
    if (n.navigationArrows != "none" && n.navigationArrows != "nexttobullets") o = n.soloArrowStyle;
    u("left");
    u("right");
    e.parent().find(".tp-rightarrow").click(function () {
      if (n.transition == 0) {
        if (e.data("showus") != t && e.data("showus") != -1) n.next = e.data("showus") - 1;else n.next = n.next + 1;
        e.data("showus", -1);
        if (n.next >= n.slideamount) n.next = 0;
        if (n.next < 0) n.next = 0;
        if (n.act != n.next) f(n, e);
      }
    });
    e.parent().find(".tp-leftarrow").click(function () {
      if (n.transition == 0) {
        n.next = n.next - 1;
        n.leftarrowpressed = 1;
        if (n.next < 0) n.next = n.slideamount - 1;
        f(n, e);
      }
    });
    v(e, n);
  };

  var h = function h(n, r) {
    e(document).keydown(function (e) {
      if (r.transition == 0 && e.keyCode == 39) {
        if (n.data("showus") != t && n.data("showus") != -1) r.next = n.data("showus") - 1;else r.next = r.next + 1;
        n.data("showus", -1);
        if (r.next >= r.slideamount) r.next = 0;
        if (r.next < 0) r.next = 0;
        if (r.act != r.next) f(r, n);
      }

      if (r.transition == 0 && e.keyCode == 37) {
        r.next = r.next - 1;
        r.leftarrowpressed = 1;
        if (r.next < 0) r.next = r.slideamount - 1;
        f(r, n);
      }
    });
    v(n, r);
  };

  var p = function p(t, n) {
    var r = "vertical";

    if (n.touchenabled == "on") {
      if (n.drag_block_vertical == true) r = "none";
      t.swipe({
        allowPageScroll: r,
        fingers: n.swipe_min_touches,
        treshold: n.swipe_treshold,
        swipe: function swipe(i, s, o, u, a, l) {
          switch (s) {
            case "left":
              if (n.transition == 0) {
                n.next = n.next + 1;
                if (n.next == n.slideamount) n.next = 0;
                f(n, t);
              }

              break;

            case "right":
              if (n.transition == 0) {
                n.next = n.next - 1;
                n.leftarrowpressed = 1;
                if (n.next < 0) n.next = n.slideamount - 1;
                f(n, t);
              }

              break;

            case "up":
              if (r == "none") e("html, body").animate({
                scrollTop: t.offset().top + t.height() + "px"
              });
              break;

            case "down":
              if (r == "none") e("html, body").animate({
                scrollTop: t.offset().top - e(window).height() + "px"
              });
              break;
          }
        }
      });
    }
  };

  var d = function d(e, t) {
    var n = e.parent().find(".tp-bullets"),
        r = e.parent().find(".tparrows");

    if (n == null) {
      e.append('<div class=".tp-bullets"></div>');
      var n = e.parent().find(".tp-bullets");
    }

    if (r == null) {
      e.append('<div class=".tparrows"></div>');
      var r = e.parent().find(".tparrows");
    }

    e.data("hideThumbs", t.hideThumbs);
    n.addClass("hidebullets");
    r.addClass("hidearrows");

    if (J()) {
      try {
        e.hammer().on("touch", function () {
          e.addClass("hovered");
          if (t.onHoverStop == "on") e.trigger("stoptimer");
          clearTimeout(e.data("hideThumbs"));
          n.removeClass("hidebullets");
          r.removeClass("hidearrows");
        });
        e.hammer().on("release", function () {
          e.removeClass("hovered");
          e.trigger("starttimer");
          if (!e.hasClass("hovered") && !n.hasClass("hovered")) e.data("hideThumbs", setTimeout(function () {
            n.addClass("hidebullets");
            r.addClass("hidearrows");
            e.trigger("starttimer");
          }, t.hideNavDelayOnMobile));
        });
      } catch (i) {}
    } else {
      n.hover(function () {
        t.overnav = true;
        if (t.onHoverStop == "on") e.trigger("stoptimer");
        n.addClass("hovered");
        clearTimeout(e.data("hideThumbs"));
        n.removeClass("hidebullets");
        r.removeClass("hidearrows");
      }, function () {
        t.overnav = false;
        e.trigger("starttimer");
        n.removeClass("hovered");
        if (!e.hasClass("hovered") && !n.hasClass("hovered")) e.data("hideThumbs", setTimeout(function () {
          n.addClass("hidebullets");
          r.addClass("hidearrows");
        }, t.hideThumbs));
      });
      r.hover(function () {
        t.overnav = true;
        if (t.onHoverStop == "on") e.trigger("stoptimer");
        n.addClass("hovered");
        clearTimeout(e.data("hideThumbs"));
        n.removeClass("hidebullets");
        r.removeClass("hidearrows");
      }, function () {
        t.overnav = false;
        e.trigger("starttimer");
        n.removeClass("hovered");
      });
      e.on("mouseenter", function () {
        e.addClass("hovered");
        if (t.onHoverStop == "on") e.trigger("stoptimer");
        clearTimeout(e.data("hideThumbs"));
        n.removeClass("hidebullets");
        r.removeClass("hidearrows");
      });
      e.on("mouseleave", function () {
        e.removeClass("hovered");
        e.trigger("starttimer");
        if (!e.hasClass("hovered") && !n.hasClass("hovered")) e.data("hideThumbs", setTimeout(function () {
          n.addClass("hidebullets");
          r.addClass("hidearrows");
        }, t.hideThumbs));
      });
    }
  };

  var v = function v(t, n) {
    var r = t.parent();
    var i = r.find(".tp-bullets");

    if (n.navigationType == "thumb") {
      i.find(".thumb").each(function (t) {
        var r = e(this);
        r.css({
          width: n.thumbWidth * n.bw + "px",
          height: n.thumbHeight * n.bh + "px"
        });
      });
      var s = i.find(".tp-mask");
      s.width(n.thumbWidth * n.thumbAmount * n.bw);
      s.height(n.thumbHeight * n.bh);
      s.parent().width(n.thumbWidth * n.thumbAmount * n.bw);
      s.parent().height(n.thumbHeight * n.bh);
    }

    var o = r.find(".tp-leftarrow");
    var u = r.find(".tp-rightarrow");
    if (n.navigationType == "thumb" && n.navigationArrows == "nexttobullets") n.navigationArrows = "solo";

    if (n.navigationArrows == "nexttobullets") {
      o.prependTo(i).css({
        "float": "left"
      });
      u.insertBefore(i.find(".tpclear")).css({
        "float": "left"
      });
    }

    var a = 0;
    if (n.forceFullWidth == "on") a = 0 - n.container.parent().offset().left;
    var f = 0,
        l = 0;

    if (n.navigationInGrid == "on") {
      f = t.width() > n.startwidth ? (t.width() - n.startwidth) / 2 : 0, l = t.height() > n.startheight ? (t.height() - n.startheight) / 2 : 0;
    }

    if (n.navigationArrows != "none" && n.navigationArrows != "nexttobullets") {
      var c = n.soloArrowLeftValign,
          h = n.soloArrowLeftHalign,
          p = n.soloArrowRightValign,
          d = n.soloArrowRightHalign,
          v = n.soloArrowLeftVOffset,
          m = n.soloArrowLeftHOffset,
          g = n.soloArrowRightVOffset,
          y = n.soloArrowRightHOffset;
      o.css({
        position: "absolute"
      });
      u.css({
        position: "absolute"
      });
      if (c == "center") o.css({
        top: "50%",
        marginTop: v - Math.round(o.innerHeight() / 2) + "px"
      });else if (c == "bottom") o.css({
        top: "auto",
        bottom: 0 + v + "px"
      });else if (c == "top") o.css({
        bottom: "auto",
        top: 0 + v + "px"
      });
      if (h == "center") o.css({
        left: "50%",
        marginLeft: a + m - Math.round(o.innerWidth() / 2) + "px"
      });else if (h == "left") o.css({
        left: f + m + a + "px"
      });else if (h == "right") o.css({
        right: f + m - a + "px"
      });
      if (p == "center") u.css({
        top: "50%",
        marginTop: g - Math.round(u.innerHeight() / 2) + "px"
      });else if (p == "bottom") u.css({
        top: "auto",
        bottom: 0 + g + "px"
      });else if (p == "top") u.css({
        bottom: "auto",
        top: 0 + g + "px"
      });
      if (d == "center") u.css({
        left: "50%",
        marginLeft: a + y - Math.round(u.innerWidth() / 2) + "px"
      });else if (d == "left") u.css({
        left: f + y + a + "px"
      });else if (d == "right") u.css({
        right: f + y - a + "px"
      });
      if (o.position() != null) o.css({
        top: Math.round(parseInt(o.position().top, 0)) + "px"
      });
      if (u.position() != null) u.css({
        top: Math.round(parseInt(u.position().top, 0)) + "px"
      });
    }

    if (n.navigationArrows == "none") {
      o.css({
        visibility: "hidden"
      });
      u.css({
        visibility: "hidden"
      });
    }

    var b = n.navigationVAlign,
        w = n.navigationHAlign,
        E = n.navigationVOffset * n.bh,
        S = n.navigationHOffset * n.bw;
    if (b == "center") i.css({
      top: "50%",
      marginTop: E - Math.round(i.innerHeight() / 2) + "px"
    });
    if (b == "bottom") i.css({
      bottom: 0 + E + "px"
    });
    if (b == "top") i.css({
      top: 0 + E + "px"
    });
    if (w == "center") i.css({
      left: "50%",
      marginLeft: a + S - Math.round(i.innerWidth() / 2) + "px"
    });
    if (w == "left") i.css({
      left: 0 + S + a + "px"
    });
    if (w == "right") i.css({
      right: 0 + S - a + "px"
    });
  };

  var m = function m(n) {
    var r = n.container;
    n.beforli = n.next - 1;
    n.comingli = n.next + 1;
    if (n.beforli < 0) n.beforli = n.slideamount - 1;
    if (n.comingli >= n.slideamount) n.comingli = 0;
    var i = r.find(">ul:first-child >li:eq(" + n.comingli + ")"),
        s = r.find(">ul:first-child >li:eq(" + n.beforli + ")"),
        o = s.find(".defaultimg").attr("src"),
        u = i.find(".defaultimg").attr("src");

    if (n.arr == t) {
      n.arr = r.parent().find(".tparrows"), n.rar = r.parent().find(".tp-rightarrow"), n.lar = r.parent().find(".tp-leftarrow"), n.raimg = n.rar.find(".tp-arr-imgholder"), n.laimg = n.lar.find(".tp-arr-imgholder"), n.raimg_b = n.rar.find(".tp-arr-imgholder2"), n.laimg_b = n.lar.find(".tp-arr-imgholder2"), n.ratit = n.rar.find(".tp-arr-titleholder"), n.latit = n.lar.find(".tp-arr-titleholder");
    }

    var a = n.arr,
        f = n.rar,
        l = n.lar,
        c = n.raimg,
        h = n.laimg,
        p = n.raimg_b,
        d = n.laimg_b,
        v = n.ratit,
        m = n.latit;
    if (i.data("title") != t) v.html(i.data("title"));
    if (s.data("title") != t) m.html(s.data("title"));

    if (f.hasClass("itishovered")) {
      f.width(v.outerWidth(true) + parseInt(f.css("minWidth"), 0));
    }

    if (l.hasClass("itishovered")) {
      l.width(m.outerWidth(true) + parseInt(l.css("minWidth"), 0));
    }

    if (a.hasClass("preview2") && !a.hasClass("hashoveralready")) {
      a.addClass("hashoveralready");
      if (!J()) a.hover(function () {
        var t = e(this),
            n = t.find(".tp-arr-titleholder");
        if (e(window).width() > 767) t.width(n.outerWidth(true) + parseInt(t.css("minWidth"), 0));
        t.addClass("itishovered");
      }, function () {
        var t = e(this),
            n = t.find(".tp-arr-titleholder");
        t.css({
          width: parseInt(t.css("minWidth"), 0)
        });
        t.removeClass("itishovered");
      });else {
        var a = e(this),
            g = a.find(".tp-arr-titleholder");
        g.addClass("alwayshidden");
        punchgs.TweenLite.set(g, {
          autoAlpha: 0
        });
      }
    }

    if (s.data("thumb") != t) o = s.data("thumb");
    if (i.data("thumb") != t) u = i.data("thumb");

    if (!a.hasClass("preview4")) {
      punchgs.TweenLite.to(c, .5, {
        autoAlpha: 0,
        onComplete: function onComplete() {
          c.css({
            backgroundImage: "url(" + u + ")"
          });
          h.css({
            backgroundImage: "url(" + o + ")"
          });
        }
      });
      punchgs.TweenLite.to(h, .5, {
        autoAlpha: 0,
        onComplete: function onComplete() {
          punchgs.TweenLite.to(c, .5, {
            autoAlpha: 1,
            delay: .2
          });
          punchgs.TweenLite.to(h, .5, {
            autoAlpha: 1,
            delay: .2
          });
        }
      });
    } else {
      p.css({
        backgroundImage: "url(" + u + ")"
      });
      d.css({
        backgroundImage: "url(" + o + ")"
      });
      punchgs.TweenLite.fromTo(p, .8, {
        force3D: punchgs.force3d,
        x: 0
      }, {
        x: -c.width(),
        ease: punchgs.Power3.easeOut,
        delay: 1,
        onComplete: function onComplete() {
          c.css({
            backgroundImage: "url(" + u + ")"
          });
          punchgs.TweenLite.set(p, {
            x: 0
          });
        }
      });
      punchgs.TweenLite.fromTo(d, .8, {
        force3D: punchgs.force3d,
        x: 0
      }, {
        x: c.width(),
        ease: punchgs.Power3.easeOut,
        delay: 1,
        onComplete: function onComplete() {
          h.css({
            backgroundImage: "url(" + o + ")"
          });
          punchgs.TweenLite.set(d, {
            x: 0
          });
        }
      });
      punchgs.TweenLite.fromTo(c, .8, {
        x: 0
      }, {
        force3D: punchgs.force3d,
        x: -c.width(),
        ease: punchgs.Power3.easeOut,
        delay: 1,
        onComplete: function onComplete() {
          punchgs.TweenLite.set(c, {
            x: 0
          });
        }
      });
      punchgs.TweenLite.fromTo(h, .8, {
        x: 0
      }, {
        force3D: punchgs.force3d,
        x: c.width(),
        ease: punchgs.Power3.easeOut,
        delay: 1,
        onComplete: function onComplete() {
          punchgs.TweenLite.set(h, {
            x: 0
          });
        }
      });
    }

    if (f.hasClass("preview4") && !f.hasClass("hashoveralready")) {
      f.addClass("hashoveralready");
      f.hover(function () {
        var t = e(this).find(".tp-arr-iwrapper");
        var n = e(this).find(".tp-arr-allwrapper");
        punchgs.TweenLite.fromTo(t, .4, {
          x: t.width()
        }, {
          x: 0,
          delay: .3,
          ease: punchgs.Power3.easeOut,
          overwrite: "all"
        });
        punchgs.TweenLite.to(n, .2, {
          autoAlpha: 1,
          overwrite: "all"
        });
      }, function () {
        var t = e(this).find(".tp-arr-iwrapper");
        var n = e(this).find(".tp-arr-allwrapper");
        punchgs.TweenLite.to(t, .4, {
          x: t.width(),
          ease: punchgs.Power3.easeOut,
          delay: .2,
          overwrite: "all"
        });
        punchgs.TweenLite.to(n, .2, {
          delay: .6,
          autoAlpha: 0,
          overwrite: "all"
        });
      });
      l.hover(function () {
        var t = e(this).find(".tp-arr-iwrapper");
        var n = e(this).find(".tp-arr-allwrapper");
        punchgs.TweenLite.fromTo(t, .4, {
          x: 0 - t.width()
        }, {
          x: 0,
          delay: .3,
          ease: punchgs.Power3.easeOut,
          overwrite: "all"
        });
        punchgs.TweenLite.to(n, .2, {
          autoAlpha: 1,
          overwrite: "all"
        });
      }, function () {
        var t = e(this).find(".tp-arr-iwrapper");
        var n = e(this).find(".tp-arr-allwrapper");
        punchgs.TweenLite.to(t, .4, {
          x: 0 - t.width(),
          ease: punchgs.Power3.easeOut,
          delay: .2,
          overwrite: "all"
        });
        punchgs.TweenLite.to(n, .2, {
          delay: .6,
          autoAlpha: 0,
          overwrite: "all"
        });
      });
    }
  };

  var g = function g(n, r) {
    r.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").css({
      height: r.container.height()
    });
    r.container.closest(".rev_slider_wrapper").css({
      height: r.container.height()
    });
    r.width = parseInt(r.container.width(), 0);
    r.height = parseInt(r.container.height(), 0);
    r.bw = r.width / r.startwidth;
    r.bh = r.height / r.startheight;
    if (r.bh > r.bw) r.bh = r.bw;
    if (r.bh < r.bw) r.bw = r.bh;
    if (r.bw < r.bh) r.bh = r.bw;

    if (r.bh > 1) {
      r.bw = 1;
      r.bh = 1;
    }

    if (r.bw > 1) {
      r.bw = 1;
      r.bh = 1;
    }

    r.height = Math.round(r.startheight * (r.width / r.startwidth));
    if (r.height > r.startheight && r.autoHeight != "on") r.height = r.startheight;

    if (r.fullScreen == "on") {
      r.height = r.bw * r.startheight;
      var i = r.container.parent().width();
      var s = e(window).height();

      if (r.fullScreenOffsetContainer != t) {
        try {
          var o = r.fullScreenOffsetContainer.split(",");
          e.each(o, function (t, n) {
            s = s - e(n).outerHeight(true);
            if (s < r.minFullScreenHeight) s = r.minFullScreenHeight;
          });
        } catch (u) {}

        try {
          if (r.fullScreenOffset.split("%").length > 1 && r.fullScreenOffset != t && r.fullScreenOffset.length > 0) {
            s = s - e(window).height() * parseInt(r.fullScreenOffset, 0) / 100;
          } else {
            if (r.fullScreenOffset != t && r.fullScreenOffset.length > 0) s = s - parseInt(r.fullScreenOffset, 0);
          }

          if (s < r.minFullScreenHeight) s = r.minFullScreenHeight;
        } catch (u) {}
      }

      r.container.parent().height(s);
      r.container.closest(".rev_slider_wrapper").height(s);
      r.container.css({
        height: "100%"
      });
      r.height = s;
      if (r.minHeight != t && r.height < r.minHeight) r.height = r.minHeight;
    } else {
      if (r.minHeight != t && r.height < r.minHeight) r.height = r.minHeight;
      r.container.height(r.height);
    }

    r.slotw = Math.ceil(r.width / r.slots);
    if (r.fullScreen == "on") r.sloth = Math.ceil(e(window).height() / r.slots);else r.sloth = Math.ceil(r.height / r.slots);
    if (r.autoHeight == "on") r.sloth = Math.ceil(n.height() / r.slots);
  };

  var y = function y(n, r) {
    n.find(".tp-caption").each(function () {
      e(this).addClass(e(this).data("transition"));
      e(this).addClass("start");
    });
    n.find(">ul:first").css({
      overflow: "hidden",
      width: "100%",
      height: "100%",
      maxHeight: n.parent().css("maxHeight")
    }).addClass("tp-revslider-mainul");

    if (r.autoHeight == "on") {
      n.find(">ul:first").css({
        overflow: "hidden",
        width: "100%",
        height: "100%",
        maxHeight: "none"
      });
      n.css({
        maxHeight: "none"
      });
      n.parent().css({
        maxHeight: "none"
      });
    }

    n.find(">ul:first >li").each(function (r) {
      var i = e(this);
      i.addClass("tp-revslider-slidesli");
      i.css({
        width: "100%",
        height: "100%",
        overflow: "hidden"
      });

      if (i.data("link") != t) {
        var s = i.data("link");
        var o = "_self";
        var u = 60;
        if (i.data("slideindex") == "back") u = 0;
        var a = checksl = i.data("linktoslide");

        if (a != t) {
          if (a != "next" && a != "prev") n.find(">ul:first-child >li").each(function () {
            var t = e(this);
            if (t.data("origindex") + 1 == checksl) a = t.index() + 1;
          });
        }

        if (i.data("target") != t) o = i.data("target");
        if (s != "slide") a = "no";
        var f = '<div class="tp-caption sft slidelink" style="width:100%;height:100%;z-index:' + u + ';" data-x="center" data-y="center" data-linktoslide="' + a + '" data-start="0"><a style="width:100%;height:100%;display:block"';
        if (s != "slide") f = f + ' target="' + o + '" href="' + s + '"';
        f = f + '><span style="width:100%;height:100%;display:block"></span></a></div>';
        i.append(f);
      }
    });
    n.parent().css({
      overflow: "visible"
    });
    n.find(">ul:first >li >img").each(function (n) {
      var i = e(this);
      i.addClass("defaultimg");

      if (i.data("lazyload") != t && i.data("lazydone") != 1) {} else {
        g(i, r);
      }

      if (a(8)) {
        i.data("kenburns", "off");
      }

      if (r.panZoomDisableOnMobile == "on" && J()) {
        i.data("kenburns", "off");
        i.data("bgfit", "cover");
      }

      i.wrap('<div class="slotholder" style="width:100%;height:100%;"' + 'data-duration="' + i.data("duration") + '"' + 'data-zoomstart="' + i.data("zoomstart") + '"' + 'data-zoomend="' + i.data("zoomend") + '"' + 'data-rotationstart="' + i.data("rotationstart") + '"' + 'data-rotationend="' + i.data("rotationend") + '"' + 'data-ease="' + i.data("ease") + '"' + 'data-duration="' + i.data("duration") + '"' + 'data-bgpositionend="' + i.data("bgpositionend") + '"' + 'data-bgposition="' + i.data("bgposition") + '"' + 'data-duration="' + i.data("duration") + '"' + 'data-kenburns="' + i.data("kenburns") + '"' + 'data-easeme="' + i.data("ease") + '"' + 'data-bgfit="' + i.data("bgfit") + '"' + 'data-bgfitend="' + i.data("bgfitend") + '"' + 'data-owidth="' + i.data("owidth") + '"' + 'data-oheight="' + i.data("oheight") + '"' + "></div>");
      if (r.dottedOverlay != "none" && r.dottedOverlay != t) i.closest(".slotholder").append('<div class="tp-dottedoverlay ' + r.dottedOverlay + '"></div>');
      var s = i.attr("src"),
          o = i.data("lazyload"),
          u = i.data("bgfit"),
          f = i.data("bgrepeat"),
          l = i.data("bgposition");
      if (u == t) u = "cover";
      if (f == t) f = "no-repeat";
      if (l == t) l = "center center";
      var c = i.closest(".slotholder");
      i.replaceWith('<div class="tp-bgimg defaultimg" data-lazyload="' + i.data("lazyload") + '" data-bgfit="' + u + '"data-bgposition="' + l + '" data-bgrepeat="' + f + '" data-lazydone="' + i.data("lazydone") + '" src="' + s + '" data-src="' + s + '" style="background-color:' + i.css("backgroundColor") + ";background-repeat:" + f + ";background-image:url(" + s + ");background-size:" + u + ";background-position:" + l + ';width:100%;height:100%;"></div>');

      if (a(8)) {
        c.find(".tp-bgimg").css({
          backgroundImage: "none",
          "background-image": "none"
        });
        c.find(".tp-bgimg").append('<img class="ieeightfallbackimage defaultimg" src="' + s + '" style="width:100%">');
      }

      i.css({
        opacity: 0
      });
      i.data("li-id", n);
    });
  };

  var b = function b(e, n, r, i) {
    var s = e,
        o = s.find(".defaultimg"),
        u = s.data("zoomstart"),
        f = s.data("rotationstart");
    if (o.data("currotate") != t) f = o.data("currotate");
    if (o.data("curscale") != t && i == "box") u = o.data("curscale") * 100;else if (o.data("curscale") != t) u = o.data("curscale");
    g(o, n);
    var l = o.data("src"),
        c = o.css("backgroundColor"),
        h = n.width,
        p = n.height,
        d = o.data("fxof"),
        v = 0;
    if (n.autoHeight == "on") p = n.container.height();
    if (d == t) d = 0;
    var m = 0,
        y = o.data("bgfit"),
        b = o.data("bgrepeat"),
        E = o.data("bgposition");
    if (y == t) y = "cover";
    if (b == t) b = "no-repeat";
    if (E == t) E = "center center";

    if (a(8)) {
      s.data("kenburns", "off");
      var S = l;
      l = "";
    }

    switch (i) {
      case "box":
        var x = 0,
            T = 0,
            N = 0;
        if (n.sloth > n.slotw) x = n.sloth;else x = n.slotw;

        if (!r) {
          var m = 0 - x;
        }

        n.slotw = x;
        n.sloth = x;
        var T = 0;
        var N = 0;

        if (s.data("kenburns") == "on") {
          y = u;
          if (y.toString().length < 4) y = K(y, s, n);
        }

        for (var C = 0; C < n.slots; C++) {
          N = 0;

          for (var k = 0; k < n.slots; k++) {
            s.append('<div class="slot" ' + 'style="position:absolute;' + "top:" + (v + N) + "px;" + "left:" + (d + T) + "px;" + "width:" + x + "px;" + "height:" + x + "px;" + 'overflow:hidden;">' + '<div class="slotslide" data-x="' + T + '" data-y="' + N + '" ' + 'style="position:absolute;' + "top:" + 0 + "px;" + "left:" + 0 + "px;" + "width:" + x + "px;" + "height:" + x + "px;" + 'overflow:hidden;">' + '<div style="position:absolute;' + "top:" + (0 - N) + "px;" + "left:" + (0 - T) + "px;" + "width:" + h + "px;" + "height:" + p + "px;" + "background-color:" + c + ";" + "background-image:url(" + l + ");" + "background-repeat:" + b + ";" + "background-size:" + y + ";background-position:" + E + ';">' + "</div></div></div>");
            N = N + x;

            if (a(8)) {
              s.find(".slot ").last().find(".slotslide").append('<img src="' + S + '">');
              w(s, n);
            }

            if (u != t && f != t) punchgs.TweenLite.set(s.find(".slot").last(), {
              rotationZ: f
            });
          }

          T = T + x;
        }

        break;

      case "vertical":
      case "horizontal":
        if (s.data("kenburns") == "on") {
          y = u;
          if (y.toString().length < 4) y = K(y, s, n);
        }

        if (i == "horizontal") {
          if (!r) var m = 0 - n.slotw;

          for (var k = 0; k < n.slots; k++) {
            s.append('<div class="slot" style="position:absolute;' + "top:" + (0 + v) + "px;" + "left:" + (d + k * n.slotw) + "px;" + "overflow:hidden;width:" + (n.slotw + .6) + "px;" + "height:" + p + 'px">' + '<div class="slotslide" style="position:absolute;' + "top:0px;left:" + m + "px;" + "width:" + (n.slotw + .6) + "px;" + "height:" + p + 'px;overflow:hidden;">' + '<div style="background-color:' + c + ";" + "position:absolute;top:0px;" + "left:" + (0 - k * n.slotw) + "px;" + "width:" + h + "px;height:" + p + "px;" + "background-image:url(" + l + ");" + "background-repeat:" + b + ";" + "background-size:" + y + ";background-position:" + E + ';">' + "</div></div></div>");
            if (u != t && f != t) punchgs.TweenLite.set(s.find(".slot").last(), {
              rotationZ: f
            });

            if (a(8)) {
              s.find(".slot ").last().find(".slotslide").append('<img class="ieeightfallbackimage" src="' + S + '" style="width:100%;height:auto">');
              w(s, n);
            }
          }
        } else {
          if (!r) var m = 0 - n.sloth;

          for (var k = 0; k < n.slots + 2; k++) {
            s.append('<div class="slot" style="position:absolute;' + "top:" + (v + k * n.sloth) + "px;" + "left:" + d + "px;" + "overflow:hidden;" + "width:" + h + "px;" + "height:" + n.sloth + 'px">' + '<div class="slotslide" style="position:absolute;' + "top:" + m + "px;" + "left:0px;width:" + h + "px;" + "height:" + n.sloth + "px;" + 'overflow:hidden;">' + '<div style="background-color:' + c + ";" + "position:absolute;" + "top:" + (0 - k * n.sloth) + "px;" + "left:0px;" + "width:" + h + "px;height:" + p + "px;" + "background-image:url(" + l + ");" + "background-repeat:" + b + ";" + "background-size:" + y + ";background-position:" + E + ';">' + "</div></div></div>");
            if (u != t && f != t) punchgs.TweenLite.set(s.find(".slot").last(), {
              rotationZ: f
            });

            if (a(8)) {
              s.find(".slot ").last().find(".slotslide").append('<img class="ieeightfallbackimage" src="' + S + '" style="width:100%;height:auto;">');
              w(s, n);
            }
          }
        }

        break;
    }
  };

  var w = function w(e, t) {
    if (a(8)) {
      var n = e.find(".ieeightfallbackimage");
      var r = n.width(),
          i = n.height();
      if (t.startwidth / t.startheight < e.data("owidth") / e.data("oheight")) n.css({
        width: "auto",
        height: "100%"
      });else n.css({
        width: "100%",
        height: "auto"
      });
      setTimeout(function () {
        var r = n.width(),
            i = n.height(),
            s = e.data("bgposition");
        if (s == "center center") n.css({
          position: "absolute",
          top: t.height / 2 - i / 2 + "px",
          left: t.width / 2 - r / 2 + "px"
        });
        if (s == "center top" || s == "top center") n.css({
          position: "absolute",
          top: "0px",
          left: t.width / 2 - r / 2 + "px"
        });
        if (s == "center bottom" || s == "bottom center") n.css({
          position: "absolute",
          bottom: "0px",
          left: t.width / 2 - r / 2 + "px"
        });
        if (s == "right top" || s == "top right") n.css({
          position: "absolute",
          top: "0px",
          right: "0px"
        });
        if (s == "right bottom" || s == "bottom right") n.css({
          position: "absolute",
          bottom: "0px",
          right: "0px"
        });
        if (s == "right center" || s == "center right") n.css({
          position: "absolute",
          top: t.height / 2 - i / 2 + "px",
          right: "0px"
        });
        if (s == "left bottom" || s == "bottom left") n.css({
          position: "absolute",
          bottom: "0px",
          left: "0px"
        });
        if (s == "left center" || s == "center left") n.css({
          position: "absolute",
          top: t.height / 2 - i / 2 + "px",
          left: "0px"
        });
      }, 20);
    }
  };

  var E = function E(t, n, r) {
    r.find(".slot").each(function () {
      e(this).remove();
    });
    n.transition = 0;
  };

  var S = function S(n, r) {
    n.find("img, .defaultimg").each(function (n) {
      var i = e(this),
          s = i.data("lazyload");

      if (s != i.attr("src") && r < 3 && s != t && s != "undefined") {
        if (s != t && s != "undefined") {
          i.attr("src", s);
          var o = new Image();

          o.onload = function (e) {
            i.data("lazydone", 1);
            if (i.hasClass("defaultimg")) x(i, o);
          };

          o.error = function () {
            i.data("lazydone", 1);
          };

          o.src = i.attr("src");

          if (o.complete) {
            if (i.hasClass("defaultimg")) x(i, o);
            i.data("lazydone", 1);
          }
        }
      } else {
        if ((s === t || s === "undefined") && i.data("lazydone") != 1) {
          var o = new Image();

          o.onload = function () {
            if (i.hasClass("defaultimg")) x(i, o);
            i.data("lazydone", 1);
          };

          o.error = function () {
            i.data("lazydone", 1);
          };

          if (i.attr("src") != t && i.attr("src") != "undefined") {
            o.src = i.attr("src");
          } else o.src = i.data("src");

          if (o.complete) {
            if (i.hasClass("defaultimg")) {
              x(i, o);
            }

            i.data("lazydone", 1);
          }
        }
      }
    });
  };

  var x = function x(e, t) {
    var n = e.closest("li"),
        r = t.width,
        i = t.height;
    n.data("owidth", r);
    n.data("oheight", i);
    n.find(".slotholder").data("owidth", r);
    n.find(".slotholder").data("oheight", i);
    n.data("loadeddone", 1);
  };

  var T = function T(n, r, i) {
    S(n, 0);
    var s = setInterval(function () {
      i.bannertimeronpause = true;
      i.container.trigger("stoptimer");
      i.cd = 0;
      var o = 0;
      n.find("img, .defaultimg").each(function (t) {
        if (e(this).data("lazydone") != 1) {
          o++;
        }
      });
      if (o > 0) S(n, o);else {
        clearInterval(s);
        if (r != t) r();
      }
    }, 100);
  };

  var N = function N(e, n) {
    try {
      var r = e.find(">ul:first-child >li:eq(" + n.act + ")");
    } catch (i) {
      var r = e.find(">ul:first-child >li:eq(1)");
    }

    n.lastslide = n.act;
    var s = e.find(">ul:first-child >li:eq(" + n.next + ")");
    var o = s.find(".defaultimg");
    n.bannertimeronpause = true;
    e.trigger("stoptimer");
    n.cd = 0;

    if (o.data("lazyload") != t && o.data("lazyload") != "undefined" && o.data("lazydone") != 1) {
      if (!a(8)) o.css({
        backgroundImage: 'url("' + s.find(".defaultimg").data("lazyload") + '")'
      });else {
        o.attr("src", s.find(".defaultimg").data("lazyload"));
      }
      o.data("src", s.find(".defaultimg").data("lazyload"));
      o.data("lazydone", 1);
      o.data("orgw", 0);
      s.data("loadeddone", 1);
      e.find(".tp-loader").css({
        display: "block"
      });
      T(e.find(".tp-static-layers"), function () {
        T(s, function () {
          var t = s.find(".slotholder");

          if (t.data("kenburns") == "on") {
            var r = setInterval(function () {
              var i = t.data("owidth");

              if (i >= 0) {
                clearInterval(r);
                C(n, o, e);
              }
            }, 10);
          } else C(n, o, e);
        }, n);
      }, n);
    } else {
      if (s.data("loadeddone") === t) {
        s.data("loadeddone", 1);
        T(s, function () {
          C(n, o, e);
        }, n);
      } else C(n, o, e);
    }
  };

  var C = function C(e, t, n) {
    e.bannertimeronpause = false;
    e.cd = 0;
    n.trigger("nulltimer");
    n.find(".tp-loader").css({
      display: "none"
    });
    g(t, e);
    v(n, e);
    g(t, e);
    k(n, e);
  };

  var k = function k(e, n) {
    e.trigger("revolution.slide.onbeforeswap");
    n.transition = 1;
    n.videoplaying = false;

    try {
      var r = e.find(">ul:first-child >li:eq(" + n.act + ")");
    } catch (i) {
      var r = e.find(">ul:first-child >li:eq(1)");
    }

    n.lastslide = n.act;
    var s = e.find(">ul:first-child >li:eq(" + n.next + ")");
    setTimeout(function () {
      m(n);
    }, 200);
    var o = r.find(".slotholder"),
        u = s.find(".slotholder");

    if (u.data("kenburns") == "on" || o.data("kenburns") == "on") {
      Z(e, n);
      e.find(".kenburnimg").remove();
    }

    if (s.data("delay") != t) {
      n.cd = 0;
      n.delay = s.data("delay");
    } else {
      n.delay = n.origcd;
    }

    if (n.firststart == 1) punchgs.TweenLite.set(r, {
      autoAlpha: 0
    });
    punchgs.TweenLite.set(r, {
      zIndex: 18
    });
    punchgs.TweenLite.set(s, {
      autoAlpha: 0,
      zIndex: 20
    });
    var a = 0;

    if (r.index() != s.index() && n.firststart != 1) {
      a = z(r, n);
    }

    if (r.data("saveperformance") != "on") a = 0;
    setTimeout(function () {
      e.trigger("restarttimer");
      L(e, n, s, r, o, u);
    }, a);
  };

  var L = function L(n, r, i, s, o, u) {
    function x() {
      e.each(d, function (e, t) {
        if (t[0] == h || t[8] == h) {
          f = t[1];
          p = t[2];
          g = y;
        }

        y = y + 1;
      });
    }

    if (i.data("differentissplayed") == "prepared") {
      i.data("differentissplayed", "done");
      i.data("transition", i.data("savedtransition"));
      i.data("slotamount", i.data("savedslotamount"));
      i.data("masterspeed", i.data("savedmasterspeed"));
    }

    if (i.data("fstransition") != t && i.data("differentissplayed") != "done") {
      i.data("savedtransition", i.data("transition"));
      i.data("savedslotamount", i.data("slotamount"));
      i.data("savedmasterspeed", i.data("masterspeed"));
      i.data("transition", i.data("fstransition"));
      i.data("slotamount", i.data("fsslotamount"));
      i.data("masterspeed", i.data("fsmasterspeed"));
      i.data("differentissplayed", "prepared");
    }

    n.find(".active-revslide").removeClass(".active-revslide");
    i.addClass("active-revslide");
    if (i.data("transition") == t) i.data("transition", "random");
    var f = 0,
        l = i.data("transition").split(","),
        c = i.data("nexttransid") == t ? -1 : i.data("nexttransid");
    if (i.data("randomtransition") == "on") c = Math.round(Math.random() * l.length);else c = c + 1;
    if (c == l.length) c = 0;
    i.data("nexttransid", c);
    var h = l[c];

    if (r.ie) {
      if (h == "boxfade") h = "boxslide";
      if (h == "slotfade-vertical") h = "slotzoom-vertical";
      if (h == "slotfade-horizontal") h = "slotzoom-horizontal";
    }

    if (a(8)) {
      h = 11;
    }

    var p = 0;

    if (r.parallax == "scroll" && r.parallaxFirstGo == t) {
      r.parallaxFirstGo = true;
      tt(n, r);
      setTimeout(function () {
        tt(n, r);
      }, 210);
      setTimeout(function () {
        tt(n, r);
      }, 420);
    }

    if (h == "slidehorizontal") {
      h = "slideleft";
      if (r.leftarrowpressed == 1) h = "slideright";
    }

    if (h == "slidevertical") {
      h = "slideup";
      if (r.leftarrowpressed == 1) h = "slidedown";
    }

    if (h == "parallaxhorizontal") {
      h = "parallaxtoleft";
      if (r.leftarrowpressed == 1) h = "parallaxtoright";
    }

    if (h == "parallaxvertical") {
      h = "parallaxtotop";
      if (r.leftarrowpressed == 1) h = "parallaxtobottom";
    }

    var d = [["boxslide", 0, 1, 10, 0, "box", false, null, 0], ["boxfade", 1, 0, 10, 0, "box", false, null, 1], ["slotslide-horizontal", 2, 0, 0, 200, "horizontal", true, false, 2], ["slotslide-vertical", 3, 0, 0, 200, "vertical", true, false, 3], ["curtain-1", 4, 3, 0, 0, "horizontal", true, true, 4], ["curtain-2", 5, 3, 0, 0, "horizontal", true, true, 5], ["curtain-3", 6, 3, 25, 0, "horizontal", true, true, 6], ["slotzoom-horizontal", 7, 0, 0, 400, "horizontal", true, true, 7], ["slotzoom-vertical", 8, 0, 0, 0, "vertical", true, true, 8], ["slotfade-horizontal", 9, 0, 0, 500, "horizontal", true, null, 9], ["slotfade-vertical", 10, 0, 0, 500, "vertical", true, null, 10], ["fade", 11, 0, 1, 300, "horizontal", true, null, 11], ["slideleft", 12, 0, 1, 0, "horizontal", true, true, 12], ["slideup", 13, 0, 1, 0, "horizontal", true, true, 13], ["slidedown", 14, 0, 1, 0, "horizontal", true, true, 14], ["slideright", 15, 0, 1, 0, "horizontal", true, true, 15], ["papercut", 16, 0, 0, 600, "", null, null, 16], ["3dcurtain-horizontal", 17, 0, 20, 100, "vertical", false, true, 17], ["3dcurtain-vertical", 18, 0, 10, 100, "horizontal", false, true, 18], ["cubic", 19, 0, 20, 600, "horizontal", false, true, 19], ["cube", 19, 0, 20, 600, "horizontal", false, true, 20], ["flyin", 20, 0, 4, 600, "vertical", false, true, 21], ["turnoff", 21, 0, 1, 1600, "horizontal", false, true, 22], ["incube", 22, 0, 20, 200, "horizontal", false, true, 23], ["cubic-horizontal", 23, 0, 20, 500, "vertical", false, true, 24], ["cube-horizontal", 23, 0, 20, 500, "vertical", false, true, 25], ["incube-horizontal", 24, 0, 20, 500, "vertical", false, true, 26], ["turnoff-vertical", 25, 0, 1, 200, "horizontal", false, true, 27], ["fadefromright", 12, 1, 1, 0, "horizontal", true, true, 28], ["fadefromleft", 15, 1, 1, 0, "horizontal", true, true, 29], ["fadefromtop", 14, 1, 1, 0, "horizontal", true, true, 30], ["fadefrombottom", 13, 1, 1, 0, "horizontal", true, true, 31], ["fadetoleftfadefromright", 12, 2, 1, 0, "horizontal", true, true, 32], ["fadetorightfadetoleft", 15, 2, 1, 0, "horizontal", true, true, 33], ["fadetobottomfadefromtop", 14, 2, 1, 0, "horizontal", true, true, 34], ["fadetotopfadefrombottom", 13, 2, 1, 0, "horizontal", true, true, 35], ["parallaxtoright", 12, 3, 1, 0, "horizontal", true, true, 36], ["parallaxtoleft", 15, 3, 1, 0, "horizontal", true, true, 37], ["parallaxtotop", 14, 3, 1, 0, "horizontal", true, true, 38], ["parallaxtobottom", 13, 3, 1, 0, "horizontal", true, true, 39], ["scaledownfromright", 12, 4, 1, 0, "horizontal", true, true, 40], ["scaledownfromleft", 15, 4, 1, 0, "horizontal", true, true, 41], ["scaledownfromtop", 14, 4, 1, 0, "horizontal", true, true, 42], ["scaledownfrombottom", 13, 4, 1, 0, "horizontal", true, true, 43], ["zoomout", 13, 5, 1, 0, "horizontal", true, true, 44], ["zoomin", 13, 6, 1, 0, "horizontal", true, true, 45], ["notransition", 26, 0, 1, 0, "horizontal", true, null, 46]];
    var v = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45];
    var m = [16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27];
    var f = 0;
    var p = 1;
    var g = 0;
    var y = 0;
    var w = new Array();

    if (u.data("kenburns") == "on") {
      if (h == "boxslide" || h == 0 || h == "boxfade" || h == 1 || h == "papercut" || h == 16) h = 11;
      Q(n, r, true, true);
    }

    if (h == "random") {
      h = Math.round(Math.random() * d.length - 1);
      if (h > d.length - 1) h = d.length - 1;
    }

    if (h == "random-static") {
      h = Math.round(Math.random() * v.length - 1);
      if (h > v.length - 1) h = v.length - 1;
      h = v[h];
    }

    if (h == "random-premium") {
      h = Math.round(Math.random() * m.length - 1);
      if (h > m.length - 1) h = m.length - 1;
      h = m[h];
    }

    var E = [12, 13, 14, 15, 16, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45];

    if (r.isJoomla == true && window.MooTools != t && E.indexOf(h) != -1) {
      var S = Math.round(Math.random() * (m.length - 2)) + 1;
      if (S > m.length - 1) S = m.length - 1;
      if (S == 0) S = 1;
      h = m[S];
    }

    x();

    if (a(8) && f > 15 && f < 28) {
      h = Math.round(Math.random() * v.length - 1);
      if (h > v.length - 1) h = v.length - 1;
      h = v[h];
      y = 0;
      x();
    }

    var T = -1;
    if (r.leftarrowpressed == 1 || r.act > r.next) T = 1;
    r.leftarrowpressed = 0;
    if (f > 26) f = 26;
    if (f < 0) f = 0;
    var N = 300;
    if (i.data("masterspeed") != t && i.data("masterspeed") > 99 && i.data("masterspeed") < r.delay) N = i.data("masterspeed");
    if (i.data("masterspeed") != t && i.data("masterspeed") > r.delay) N = r.delay;
    w = d[g];
    n.parent().find(".bullet").each(function () {
      var t = e(this),
          n = t.index();
      t.removeClass("selected");
      if (r.navigationArrows == "withbullet" || r.navigationArrows == "nexttobullets") n = t.index() - 1;
      if (n == r.next) t.addClass("selected");
    });
    var C = new punchgs.TimelineLite({
      onComplete: function onComplete() {
        A(n, r, u, o, i, s, C);
      }
    });
    C.add(punchgs.TweenLite.set(u.find(".defaultimg"), {
      opacity: 0
    }));
    C.pause();

    if (i.data("slotamount") == t || i.data("slotamount") < 1) {
      r.slots = Math.round(Math.random() * 12 + 4);
      if (h == "boxslide") r.slots = Math.round(Math.random() * 6 + 3);else if (h == "flyin") r.slots = Math.round(Math.random() * 4 + 1);
    } else {
      r.slots = i.data("slotamount");
    }

    if (i.data("rotate") == t) r.rotate = 0;else if (i.data("rotate") == 999) r.rotate = Math.round(Math.random() * 360);else r.rotate = i.data("rotate");
    if (!e.support.transition || r.ie || r.ie9) r.rotate = 0;
    if (r.firststart == 1) r.firststart = 0;
    N = N + w[4];
    if ((f == 4 || f == 5 || f == 6) && r.slots < 3) r.slots = 3;
    if (w[3] != 0) r.slots = Math.min(r.slots, w[3]);
    if (f == 9) r.slots = r.width / 20;
    if (f == 10) r.slots = r.height / 20;
    if (w[7] != null) b(o, r, w[7], w[5]);
    if (w[6] != null) b(u, r, w[6], w[5]);

    if (f == 0) {
      var k = Math.ceil(r.height / r.sloth);
      var L = 0;
      u.find(".slotslide").each(function (t) {
        var n = e(this);
        L = L + 1;
        if (L == k) L = 0;
        C.add(punchgs.TweenLite.from(n, N / 600, {
          opacity: 0,
          top: 0 - r.sloth,
          left: 0 - r.slotw,
          rotation: r.rotate,
          force3D: "auto",
          ease: punchgs.Power2.easeOut
        }), (t * 15 + L * 30) / 1500);
      });
    }

    if (f == 1) {
      var O,
          M = 0;
      u.find(".slotslide").each(function (t) {
        var n = e(this),
            i = Math.random() * N + 300,
            s = Math.random() * 500 + 200;

        if (i + s > O) {
          O = s + s;
          M = t;
        }

        C.add(punchgs.TweenLite.from(n, i / 1e3, {
          autoAlpha: 0,
          force3D: "auto",
          rotation: r.rotate,
          ease: punchgs.Power2.easeInOut
        }), s / 1e3);
      });
    }

    if (f == 2) {
      var _ = new punchgs.TimelineLite();

      o.find(".slotslide").each(function () {
        var t = e(this);

        _.add(punchgs.TweenLite.to(t, N / 1e3, {
          left: r.slotw,
          force3D: "auto",
          rotation: 0 - r.rotate
        }), 0);

        C.add(_, 0);
      });
      u.find(".slotslide").each(function () {
        var t = e(this);

        _.add(punchgs.TweenLite.from(t, N / 1e3, {
          left: 0 - r.slotw,
          force3D: "auto",
          rotation: r.rotate
        }), 0);

        C.add(_, 0);
      });
    }

    if (f == 3) {
      var _ = new punchgs.TimelineLite();

      o.find(".slotslide").each(function () {
        var t = e(this);

        _.add(punchgs.TweenLite.to(t, N / 1e3, {
          top: r.sloth,
          rotation: r.rotate,
          force3D: "auto",
          transformPerspective: 600
        }), 0);

        C.add(_, 0);
      });
      u.find(".slotslide").each(function () {
        var t = e(this);

        _.add(punchgs.TweenLite.from(t, N / 1e3, {
          top: 0 - r.sloth,
          rotation: r.rotate,
          ease: punchgs.Power2.easeOut,
          force3D: "auto",
          transformPerspective: 600
        }), 0);

        C.add(_, 0);
      });
    }

    if (f == 4 || f == 5) {
      setTimeout(function () {
        o.find(".defaultimg").css({
          opacity: 0
        });
      }, 100);

      var D = N / 1e3,
          P = D,
          _ = new punchgs.TimelineLite();

      o.find(".slotslide").each(function (t) {
        var n = e(this);
        var i = t * D / r.slots;
        if (f == 5) i = (r.slots - t - 1) * D / r.slots / 1.5;

        _.add(punchgs.TweenLite.to(n, D * 3, {
          transformPerspective: 600,
          force3D: "auto",
          top: 0 + r.height,
          opacity: .5,
          rotation: r.rotate,
          ease: punchgs.Power2.easeInOut,
          delay: i
        }), 0);

        C.add(_, 0);
      });
      u.find(".slotslide").each(function (t) {
        var n = e(this);
        var i = t * D / r.slots;
        if (f == 5) i = (r.slots - t - 1) * D / r.slots / 1.5;

        _.add(punchgs.TweenLite.from(n, D * 3, {
          top: 0 - r.height,
          opacity: .5,
          rotation: r.rotate,
          force3D: "auto",
          ease: punchgs.Power2.easeInOut,
          delay: i
        }), 0);

        C.add(_, 0);
      });
    }

    if (f == 6) {
      if (r.slots < 2) r.slots = 2;
      if (r.slots % 2) r.slots = r.slots + 1;

      var _ = new punchgs.TimelineLite();

      setTimeout(function () {
        o.find(".defaultimg").css({
          opacity: 0
        });
      }, 100);
      o.find(".slotslide").each(function (t) {
        var n = e(this);
        if (t + 1 < r.slots / 2) var i = (t + 2) * 90;else var i = (2 + r.slots - t) * 90;

        _.add(punchgs.TweenLite.to(n, (N + i) / 1e3, {
          top: 0 + r.height,
          opacity: 1,
          force3D: "auto",
          rotation: r.rotate,
          ease: punchgs.Power2.easeInOut
        }), 0);

        C.add(_, 0);
      });
      u.find(".slotslide").each(function (t) {
        var n = e(this);
        if (t + 1 < r.slots / 2) var i = (t + 2) * 90;else var i = (2 + r.slots - t) * 90;

        _.add(punchgs.TweenLite.from(n, (N + i) / 1e3, {
          top: 0 - r.height,
          opacity: 1,
          force3D: "auto",
          rotation: r.rotate,
          ease: punchgs.Power2.easeInOut
        }), 0);

        C.add(_, 0);
      });
    }

    if (f == 7) {
      N = N * 2;
      if (N > r.delay) N = r.delay;

      var _ = new punchgs.TimelineLite();

      setTimeout(function () {
        o.find(".defaultimg").css({
          opacity: 0
        });
      }, 100);
      o.find(".slotslide").each(function () {
        var t = e(this).find("div");

        _.add(punchgs.TweenLite.to(t, N / 1e3, {
          left: 0 - r.slotw / 2 + "px",
          top: 0 - r.height / 2 + "px",
          width: r.slotw * 2 + "px",
          height: r.height * 2 + "px",
          opacity: 0,
          rotation: r.rotate,
          force3D: "auto",
          ease: punchgs.Power2.easeOut
        }), 0);

        C.add(_, 0);
      });
      u.find(".slotslide").each(function (t) {
        var n = e(this).find("div");

        _.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          left: 0,
          top: 0,
          opacity: 0,
          transformPerspective: 600
        }, {
          left: 0 - t * r.slotw + "px",
          ease: punchgs.Power2.easeOut,
          force3D: "auto",
          top: 0 + "px",
          width: r.width,
          height: r.height,
          opacity: 1,
          rotation: 0,
          delay: .1
        }), 0);

        C.add(_, 0);
      });
    }

    if (f == 8) {
      N = N * 3;
      if (N > r.delay) N = r.delay;

      var _ = new punchgs.TimelineLite();

      o.find(".slotslide").each(function () {
        var t = e(this).find("div");

        _.add(punchgs.TweenLite.to(t, N / 1e3, {
          left: 0 - r.width / 2 + "px",
          top: 0 - r.sloth / 2 + "px",
          width: r.width * 2 + "px",
          height: r.sloth * 2 + "px",
          force3D: "auto",
          opacity: 0,
          rotation: r.rotate
        }), 0);

        C.add(_, 0);
      });
      u.find(".slotslide").each(function (t) {
        var n = e(this).find("div");

        _.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          left: 0,
          top: 0,
          opacity: 0,
          force3D: "auto"
        }, {
          left: 0 + "px",
          top: 0 - t * r.sloth + "px",
          width: u.find(".defaultimg").data("neww") + "px",
          height: u.find(".defaultimg").data("newh") + "px",
          opacity: 1,
          rotation: 0
        }), 0);

        C.add(_, 0);
      });
    }

    if (f == 9 || f == 10) {
      var H = 0;
      u.find(".slotslide").each(function (t) {
        var n = e(this);
        H++;
        C.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          autoAlpha: 0,
          force3D: "auto",
          transformPerspective: 600
        }, {
          autoAlpha: 1,
          ease: punchgs.Power2.easeInOut,
          delay: t * 5 / 1e3
        }), 0);
      });
    }

    if (f == 11 || f == 26) {
      var H = 0;
      if (f == 26) N = 0;
      u.find(".slotslide").each(function (t) {
        var n = e(this);
        C.add(punchgs.TweenLite.from(n, N / 1e3, {
          autoAlpha: 0,
          force3D: "auto",
          ease: punchgs.Power2.easeInOut
        }), 0);
      });
    }

    if (f == 12 || f == 13 || f == 14 || f == 15) {
      N = N;
      if (N > r.delay) N = r.delay;
      setTimeout(function () {
        punchgs.TweenLite.set(o.find(".defaultimg"), {
          autoAlpha: 0
        });
      }, 100);
      var B = r.width,
          F = r.height,
          I = u.find(".slotslide"),
          q = 0,
          R = 0,
          U = 1,
          z = 1,
          W = 1,
          X = punchgs.Power2.easeInOut,
          V = punchgs.Power2.easeInOut,
          $ = N / 1e3,
          J = $;

      if (r.fullWidth == "on" || r.fullScreen == "on") {
        B = I.width();
        F = I.height();
      }

      if (f == 12) q = B;else if (f == 15) q = 0 - B;else if (f == 13) R = F;else if (f == 14) R = 0 - F;
      if (p == 1) U = 0;
      if (p == 2) U = 0;

      if (p == 3) {
        X = punchgs.Power2.easeInOut;
        V = punchgs.Power1.easeInOut;
        $ = N / 1200;
      }

      if (p == 4 || p == 5) z = .6;
      if (p == 6) z = 1.4;

      if (p == 5 || p == 6) {
        W = 1.4;
        U = 0;
        B = 0;
        F = 0;
        q = 0;
        R = 0;
      }

      if (p == 6) W = .6;
      var K = 0;
      C.add(punchgs.TweenLite.from(I, $, {
        left: q,
        top: R,
        scale: W,
        opacity: U,
        rotation: r.rotate,
        ease: V,
        force3D: "auto"
      }), 0);
      var G = o.find(".slotslide");

      if (p == 4 || p == 5) {
        B = 0;
        F = 0;
      }

      if (p != 1) switch (f) {
        case 12:
          C.add(punchgs.TweenLite.to(G, J, {
            left: 0 - B + "px",
            force3D: "auto",
            scale: z,
            opacity: U,
            rotation: r.rotate,
            ease: X
          }), 0);
          break;

        case 15:
          C.add(punchgs.TweenLite.to(G, J, {
            left: B + "px",
            force3D: "auto",
            scale: z,
            opacity: U,
            rotation: r.rotate,
            ease: X
          }), 0);
          break;

        case 13:
          C.add(punchgs.TweenLite.to(G, J, {
            top: 0 - F + "px",
            force3D: "auto",
            scale: z,
            opacity: U,
            rotation: r.rotate,
            ease: X
          }), 0);
          break;

        case 14:
          C.add(punchgs.TweenLite.to(G, J, {
            top: F + "px",
            force3D: "auto",
            scale: z,
            opacity: U,
            rotation: r.rotate,
            ease: X
          }), 0);
          break;
      }
    }

    if (f == 16) {
      var _ = new punchgs.TimelineLite();

      C.add(punchgs.TweenLite.set(s, {
        position: "absolute",
        "z-index": 20
      }), 0);
      C.add(punchgs.TweenLite.set(i, {
        position: "absolute",
        "z-index": 15
      }), 0);
      s.wrapInner('<div class="tp-half-one" style="position:relative; width:100%;height:100%"></div>');
      s.find(".tp-half-one").clone(true).appendTo(s).addClass("tp-half-two");
      s.find(".tp-half-two").removeClass("tp-half-one");
      var B = r.width,
          F = r.height;
      if (r.autoHeight == "on") F = n.height();
      s.find(".tp-half-one .defaultimg").wrap('<div class="tp-papercut" style="width:' + B + "px;height:" + F + 'px;"></div>');
      s.find(".tp-half-two .defaultimg").wrap('<div class="tp-papercut" style="width:' + B + "px;height:" + F + 'px;"></div>');
      s.find(".tp-half-two .defaultimg").css({
        position: "absolute",
        top: "-50%"
      });
      s.find(".tp-half-two .tp-caption").wrapAll('<div style="position:absolute;top:-50%;left:0px;"></div>');
      C.add(punchgs.TweenLite.set(s.find(".tp-half-two"), {
        width: B,
        height: F,
        overflow: "hidden",
        zIndex: 15,
        position: "absolute",
        top: F / 2,
        left: "0px",
        transformPerspective: 600,
        transformOrigin: "center bottom"
      }), 0);
      C.add(punchgs.TweenLite.set(s.find(".tp-half-one"), {
        width: B,
        height: F / 2,
        overflow: "visible",
        zIndex: 10,
        position: "absolute",
        top: "0px",
        left: "0px",
        transformPerspective: 600,
        transformOrigin: "center top"
      }), 0);
      var Y = s.find(".defaultimg"),
          Z = Math.round(Math.random() * 20 - 10),
          et = Math.round(Math.random() * 20 - 10),
          nt = Math.round(Math.random() * 20 - 10),
          rt = Math.random() * .4 - .2,
          it = Math.random() * .4 - .2,
          st = Math.random() * 1 + 1,
          ot = Math.random() * 1 + 1,
          ut = Math.random() * .3 + .3;
      C.add(punchgs.TweenLite.set(s.find(".tp-half-one"), {
        overflow: "hidden"
      }), 0);
      C.add(punchgs.TweenLite.fromTo(s.find(".tp-half-one"), N / 800, {
        width: B,
        height: F / 2,
        position: "absolute",
        top: "0px",
        left: "0px",
        force3D: "auto",
        transformOrigin: "center top"
      }, {
        scale: st,
        rotation: Z,
        y: 0 - F - F / 4,
        autoAlpha: 0,
        ease: punchgs.Power2.easeInOut
      }), 0);
      C.add(punchgs.TweenLite.fromTo(s.find(".tp-half-two"), N / 800, {
        width: B,
        height: F,
        overflow: "hidden",
        position: "absolute",
        top: F / 2,
        left: "0px",
        force3D: "auto",
        transformOrigin: "center bottom"
      }, {
        scale: ot,
        rotation: et,
        y: F + F / 4,
        ease: punchgs.Power2.easeInOut,
        autoAlpha: 0,
        onComplete: function onComplete() {
          punchgs.TweenLite.set(s, {
            position: "absolute",
            "z-index": 15
          });
          punchgs.TweenLite.set(i, {
            position: "absolute",
            "z-index": 20
          });

          if (s.find(".tp-half-one").length > 0) {
            s.find(".tp-half-one .defaultimg").unwrap();
            s.find(".tp-half-one .slotholder").unwrap();
          }

          s.find(".tp-half-two").remove();
        }
      }), 0);

      _.add(punchgs.TweenLite.set(u.find(".defaultimg"), {
        autoAlpha: 1
      }), 0);

      if (s.html() != null) C.add(punchgs.TweenLite.fromTo(i, (N - 200) / 1e3, {
        scale: ut,
        x: r.width / 4 * rt,
        y: F / 4 * it,
        rotation: nt,
        force3D: "auto",
        transformOrigin: "center center",
        ease: punchgs.Power2.easeOut
      }, {
        autoAlpha: 1,
        scale: 1,
        x: 0,
        y: 0,
        rotation: 0
      }), 0);
      C.add(_, 0);
    }

    if (f == 17) {
      u.find(".slotslide").each(function (t) {
        var n = e(this);
        C.add(punchgs.TweenLite.fromTo(n, N / 800, {
          opacity: 0,
          rotationY: 0,
          scale: .9,
          rotationX: -110,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: "center center"
        }, {
          opacity: 1,
          top: 0,
          left: 0,
          scale: 1,
          rotation: 0,
          rotationX: 0,
          force3D: "auto",
          rotationY: 0,
          ease: punchgs.Power3.easeOut,
          delay: t * .06
        }), 0);
      });
    }

    if (f == 18) {
      u.find(".slotslide").each(function (t) {
        var n = e(this);
        C.add(punchgs.TweenLite.fromTo(n, N / 500, {
          autoAlpha: 0,
          rotationY: 310,
          scale: .9,
          rotationX: 10,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: "center center"
        }, {
          autoAlpha: 1,
          top: 0,
          left: 0,
          scale: 1,
          rotation: 0,
          rotationX: 0,
          force3D: "auto",
          rotationY: 0,
          ease: punchgs.Power3.easeOut,
          delay: t * .06
        }), 0);
      });
    }

    if (f == 19 || f == 22) {
      var _ = new punchgs.TimelineLite();

      C.add(punchgs.TweenLite.set(s, {
        zIndex: 20
      }), 0);
      C.add(punchgs.TweenLite.set(i, {
        zIndex: 20
      }), 0);
      setTimeout(function () {
        o.find(".defaultimg").css({
          opacity: 0
        });
      }, 100);
      var at = i.css("z-index"),
          ft = s.css("z-index"),
          lt = 90,
          U = 1,
          ct = "center center ";
      if (T == 1) lt = -90;

      if (f == 19) {
        ct = ct + "-" + r.height / 2;
        U = 0;
      } else {
        ct = ct + r.height / 2;
      }

      punchgs.TweenLite.set(n, {
        transformStyle: "flat",
        backfaceVisibility: "hidden",
        transformPerspective: 600
      });
      u.find(".slotslide").each(function (t) {
        var n = e(this);

        _.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          transformStyle: "flat",
          backfaceVisibility: "hidden",
          left: 0,
          rotationY: r.rotate,
          z: 10,
          top: 0,
          scale: 1,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: ct,
          rotationX: lt
        }, {
          left: 0,
          rotationY: 0,
          top: 0,
          z: 0,
          scale: 1,
          force3D: "auto",
          rotationX: 0,
          delay: t * 50 / 1e3,
          ease: punchgs.Power2.easeInOut
        }), 0);

        _.add(punchgs.TweenLite.to(n, .1, {
          autoAlpha: 1,
          delay: t * 50 / 1e3
        }), 0);

        C.add(_);
      });
      o.find(".slotslide").each(function (t) {
        var n = e(this);
        var i = -90;
        if (T == 1) i = 90;

        _.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          transformStyle: "flat",
          backfaceVisibility: "hidden",
          autoAlpha: 1,
          rotationY: 0,
          top: 0,
          z: 0,
          scale: 1,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: ct,
          rotationX: 0
        }, {
          autoAlpha: 1,
          rotationY: r.rotate,
          top: 0,
          z: 10,
          scale: 1,
          rotationX: i,
          delay: t * 50 / 1e3,
          force3D: "auto",
          ease: punchgs.Power2.easeInOut
        }), 0);

        C.add(_);
      });
    }

    if (f == 20) {
      setTimeout(function () {
        o.find(".defaultimg").css({
          opacity: 0
        });
      }, 100);
      var at = i.css("z-index"),
          ft = s.css("z-index");

      if (T == 1) {
        var ht = -r.width;
        var lt = 70;
        var ct = "left center -" + r.height / 2;
      } else {
        var ht = r.width;
        var lt = -70;
        var ct = "right center -" + r.height / 2;
      }

      u.find(".slotslide").each(function (t) {
        var n = e(this);
        C.add(punchgs.TweenLite.fromTo(n, N / 1500, {
          left: ht,
          rotationX: 40,
          z: -600,
          opacity: U,
          top: 0,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: ct,
          rotationY: lt
        }, {
          left: 0,
          delay: t * 50 / 1e3,
          ease: punchgs.Power2.easeInOut
        }), 0);
        C.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          rotationX: 40,
          z: -600,
          opacity: U,
          top: 0,
          scale: 1,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: ct,
          rotationY: lt
        }, {
          rotationX: 0,
          opacity: 1,
          top: 0,
          z: 0,
          scale: 1,
          rotationY: 0,
          delay: t * 50 / 1e3,
          ease: punchgs.Power2.easeInOut
        }), 0);
        C.add(punchgs.TweenLite.to(n, .1, {
          opacity: 1,
          force3D: "auto",
          delay: t * 50 / 1e3 + N / 2e3
        }), 0);
      });
      o.find(".slotslide").each(function (t) {
        var n = e(this);

        if (T != 1) {
          var i = -r.width;
          var s = 70;
          var o = "left center -" + r.height / 2;
        } else {
          var i = r.width;
          var s = -70;
          var o = "right center -" + r.height / 2;
        }

        C.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          opacity: 1,
          rotationX: 0,
          top: 0,
          z: 0,
          scale: 1,
          left: 0,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: o,
          rotationY: 0
        }, {
          opacity: 1,
          rotationX: 40,
          top: 0,
          z: -600,
          left: i,
          force3D: "auto",
          scale: .8,
          rotationY: s,
          delay: t * 50 / 1e3,
          ease: punchgs.Power2.easeInOut
        }), 0);
        C.add(punchgs.TweenLite.to(n, .1, {
          force3D: "auto",
          opacity: 0,
          delay: t * 50 / 1e3 + (N / 1e3 - N / 1e4)
        }), 0);
      });
    }

    if (f == 21 || f == 25) {
      setTimeout(function () {
        o.find(".defaultimg").css({
          opacity: 0
        });
      }, 100);
      var at = i.css("z-index"),
          ft = s.css("z-index"),
          lt = 90,
          ht = -r.width,
          pt = -lt;

      if (T == 1) {
        if (f == 25) {
          var ct = "center top 0";
          lt = r.rotate;
        } else {
          var ct = "left center 0";
          pt = r.rotate;
        }
      } else {
        ht = r.width;
        lt = -90;

        if (f == 25) {
          var ct = "center bottom 0";
          pt = -lt;
          lt = r.rotate;
        } else {
          var ct = "right center 0";
          pt = r.rotate;
        }
      }

      u.find(".slotslide").each(function (t) {
        var n = e(this);
        C.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          left: 0,
          transformStyle: "flat",
          rotationX: pt,
          z: 0,
          autoAlpha: 0,
          top: 0,
          scale: 1,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: ct,
          rotationY: lt
        }, {
          left: 0,
          rotationX: 0,
          top: 0,
          z: 0,
          autoAlpha: 1,
          scale: 1,
          rotationY: 0,
          force3D: "auto",
          ease: punchgs.Power3.easeInOut
        }), 0);
      });

      if (T != 1) {
        ht = -r.width;
        lt = 90;

        if (f == 25) {
          ct = "center top 0";
          pt = -lt;
          lt = r.rotate;
        } else {
          ct = "left center 0";
          pt = r.rotate;
        }
      } else {
        ht = r.width;
        lt = -90;

        if (f == 25) {
          ct = "center bottom 0";
          pt = -lt;
          lt = r.rotate;
        } else {
          ct = "right center 0";
          pt = r.rotate;
        }
      }

      o.find(".slotslide").each(function (t) {
        var n = e(this);
        C.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          left: 0,
          transformStyle: "flat",
          rotationX: 0,
          z: 0,
          autoAlpha: 1,
          top: 0,
          scale: 1,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: ct,
          rotationY: 0
        }, {
          left: 0,
          rotationX: pt,
          top: 0,
          z: 0,
          autoAlpha: 1,
          force3D: "auto",
          scale: 1,
          rotationY: lt,
          ease: punchgs.Power1.easeInOut
        }), 0);
      });
    }

    if (f == 23 || f == 24) {
      setTimeout(function () {
        o.find(".defaultimg").css({
          opacity: 0
        });
      }, 100);
      var at = i.css("z-index"),
          ft = s.css("z-index"),
          lt = -90,
          U = 1,
          dt = 0;
      if (T == 1) lt = 90;

      if (f == 23) {
        var ct = "center center -" + r.width / 2;
        U = 0;
      } else var ct = "center center " + r.width / 2;

      punchgs.TweenLite.set(n, {
        transformStyle: "preserve-3d",
        backfaceVisibility: "hidden",
        perspective: 2500
      });
      u.find(".slotslide").each(function (t) {
        var n = e(this);
        C.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          left: dt,
          rotationX: r.rotate,
          force3D: "auto",
          opacity: U,
          top: 0,
          scale: 1,
          transformPerspective: 600,
          transformOrigin: ct,
          rotationY: lt
        }, {
          left: 0,
          rotationX: 0,
          autoAlpha: 1,
          top: 0,
          z: 0,
          scale: 1,
          rotationY: 0,
          delay: t * 50 / 500,
          ease: punchgs.Power2.easeInOut
        }), 0);
      });
      lt = 90;
      if (T == 1) lt = -90;
      o.find(".slotslide").each(function (t) {
        var n = e(this);
        C.add(punchgs.TweenLite.fromTo(n, N / 1e3, {
          left: 0,
          autoAlpha: 1,
          rotationX: 0,
          top: 0,
          z: 0,
          scale: 1,
          force3D: "auto",
          transformPerspective: 600,
          transformOrigin: ct,
          rotationY: 0
        }, {
          left: dt,
          autoAlpha: 1,
          rotationX: r.rotate,
          top: 0,
          scale: 1,
          rotationY: lt,
          delay: t * 50 / 500,
          ease: punchgs.Power2.easeInOut
        }), 0);
      });
    }

    C.pause();
    j(i, r, null, C);
    punchgs.TweenLite.to(i, .001, {
      autoAlpha: 1
    });
    var vt = {};
    vt.slideIndex = r.next + 1;
    vt.slide = i;
    n.trigger("revolution.slide.onchange", vt);
    setTimeout(function () {
      n.trigger("revolution.slide.onafterswap");
    }, N);
    n.trigger("revolution.slide.onvideostop");
  };

  var A = function A(e, t, n, r, i, s, o) {
    punchgs.TweenLite.to(n.find(".defaultimg"), .001, {
      autoAlpha: 1,
      onComplete: function onComplete() {
        E(e, t, i);
      }
    });

    if (i.index() != s.index()) {
      punchgs.TweenLite.to(s, .2, {
        autoAlpha: 0,
        onComplete: function onComplete() {
          E(e, t, s);
        }
      });
    }

    t.act = t.next;
    if (t.navigationType == "thumb") rt(e);

    if (n.data("kenburns") == "on") {
      Q(e, t);
    }

    e.find(".current-sr-slide-visible").removeClass("current-sr-slide-visible");
    i.addClass("current-sr-slide-visible");

    if (t.parallax == "scroll" || t.parallax == "scroll+mouse" || t.parallax == "mouse+scroll") {
      tt(e, t);
    }

    o.clear();
  };

  var O = function O(t) {
    var n = t.target.getVideoEmbedCode();
    var r = e("#" + n.split('id="')[1].split('"')[0]);
    var i = r.closest(".tp-simpleresponsive");
    var s = r.parent().data("player");

    if (t.data == YT.PlayerState.PLAYING) {
      var o = i.find(".tp-bannertimer");
      var u = o.data("opt");
      if (r.closest(".tp-caption").data("volume") == "mute") s.mute();
      u.videoplaying = true;
      i.trigger("stoptimer");
      i.trigger("revolution.slide.onvideoplay");
    } else {
      var o = i.find(".tp-bannertimer");
      var u = o.data("opt");

      if (t.data != -1 && t.data != 3) {
        u.videoplaying = false;
        i.trigger("starttimer");
        i.trigger("revolution.slide.onvideostop");
      }

      if (t.data == 0 && u.nextslideatend == true) u.container.revnext();else {
        u.videoplaying = false;
        i.trigger("starttimer");
        i.trigger("revolution.slide.onvideostop");
      }
    }
  };

  var M = function M(e, t, n) {
    if (e.addEventListener) e.addEventListener(t, n, false);else e.attachEvent(t, n, false);
  };

  var _ = function _(t, n) {
    var r = $f(t),
        i = e("#" + t),
        s = i.closest(".tp-simpleresponsive"),
        o = i.closest(".tp-caption");
    setTimeout(function () {
      r.addEvent("ready", function (t) {
        if (n) r.api("play");
        r.addEvent("play", function (e) {
          var t = s.find(".tp-bannertimer");
          var n = t.data("opt");
          n.videoplaying = true;
          s.trigger("stoptimer");
          if (o.data("volume") == "mute") r.api("setVolume", "0");
        });
        r.addEvent("finish", function (e) {
          var t = s.find(".tp-bannertimer");
          var n = t.data("opt");
          n.videoplaying = false;
          s.trigger("starttimer");
          s.trigger("revolution.slide.onvideoplay");
          if (n.nextslideatend == true) n.container.revnext();
        });
        r.addEvent("pause", function (e) {
          var t = s.find(".tp-bannertimer");
          var n = t.data("opt");
          n.videoplaying = false;
          s.trigger("starttimer");
          s.trigger("revolution.slide.onvideostop");
        });
        o.find(".tp-thumb-image").click(function () {
          punchgs.TweenLite.to(e(this), .3, {
            autoAlpha: 0,
            force3D: "auto",
            ease: punchgs.Power3.easeInOut
          });
          r.api("play");
        });
      });
    }, 150);
  };

  var D = function D(e, n) {
    var r = n.width();
    var i = n.height();
    var s = e.data("mediaAspect");
    if (s == t) s = 1;
    var o = r / i;
    e.css({
      position: "absolute"
    });
    var u = e.find("video");

    if (o < s) {
      punchgs.TweenLite.to(e, 1e-4, {
        width: i * s,
        force3D: "auto",
        top: 0,
        left: 0 - (i * s - r) / 2,
        height: i
      });
    } else {
      punchgs.TweenLite.to(e, 1e-4, {
        width: r,
        force3D: "auto",
        top: 0 - (r / s - i) / 2,
        left: 0,
        height: r / s
      });
    }
  };

  var P = function P() {
    var e = new Object();
    e.x = 0;
    e.y = 0;
    e.rotationX = 0;
    e.rotationY = 0;
    e.rotationZ = 0;
    e.scale = 1;
    e.scaleX = 1;
    e.scaleY = 1;
    e.skewX = 0;
    e.skewY = 0;
    e.opacity = 0;
    e.transformOrigin = "center, center";
    e.transformPerspective = 400;
    e.rotation = 0;
    return e;
  };

  var H = function H(t, n) {
    var r = n.split(";");
    e.each(r, function (e, n) {
      n = n.split(":");
      var r = n[0],
          i = n[1];
      if (r == "rotationX") t.rotationX = parseInt(i, 0);
      if (r == "rotationY") t.rotationY = parseInt(i, 0);
      if (r == "rotationZ") t.rotationZ = parseInt(i, 0);
      if (r == "rotationZ") t.rotation = parseInt(i, 0);
      if (r == "scaleX") t.scaleX = parseFloat(i);
      if (r == "scaleY") t.scaleY = parseFloat(i);
      if (r == "opacity") t.opacity = parseFloat(i);
      if (r == "skewX") t.skewX = parseInt(i, 0);
      if (r == "skewY") t.skewY = parseInt(i, 0);
      if (r == "x") t.x = parseInt(i, 0);
      if (r == "y") t.y = parseInt(i, 0);
      if (r == "z") t.z = parseInt(i, 0);
      if (r == "transformOrigin") t.transformOrigin = i.toString();
      if (r == "transformPerspective") t.transformPerspective = parseInt(i, 0);
    });
    return t;
  };

  var B = function B(t) {
    var n = t.split("animation:");
    var r = new Object();
    r.animation = H(P(), n[1]);
    var i = n[0].split(";");
    e.each(i, function (e, t) {
      t = t.split(":");
      var n = t[0],
          i = t[1];
      if (n == "typ") r.typ = i;
      if (n == "speed") r.speed = parseInt(i, 0) / 1e3;
      if (n == "start") r.start = parseInt(i, 0) / 1e3;
      if (n == "elementdelay") r.elementdelay = parseFloat(i);
      if (n == "ease") r.ease = i;
    });
    return r;
  };

  var j = function j(n, r, i, s) {
    function o() {}

    function u() {}

    if (n.data("ctl") == t) {
      n.data("ctl", new punchgs.TimelineLite());
    }

    var f = n.data("ctl"),
        l = 0,
        c = 0,
        h = n.find(".tp-caption"),
        p = r.container.find(".tp-static-layers").find(".tp-caption");
    f.pause();
    e.each(p, function (e, t) {
      h.push(t);
    });
    h.each(function (n) {
      var s = i,
          f = -1,
          h = e(this);

      if (h.hasClass("tp-static-layer")) {
        var p = h.data("startslide"),
            d = h.data("endslide");
        if (p == -1 || p == "-1") h.data("startslide", 0);
        if (d == -1 || d == "-1") h.data("endslide", r.slideamount);
        if (p == 0 && d == r.slideamount - 1) h.data("endslide", r.slideamount + 1);
        p = h.data("startslide"), d = h.data("endslide");

        if (!h.hasClass("tp-is-shown")) {
          if (p <= r.next && d >= r.next || p == r.next || d == r.next) {
            h.addClass("tp-is-shown");
            f = 1;
          } else {
            f = 0;
          }
        } else {
          if (d == r.next || p > r.next || d < r.next) {
            f = 2;
          } else {
            f = 0;
          }
        }
      }

      l = r.width / 2 - r.startwidth * r.bw / 2;
      var v = r.bw;
      var m = r.bh;
      if (r.fullScreen == "on") c = r.height / 2 - r.startheight * r.bh / 2;
      if (r.autoHeight == "on" || r.minHeight != t && r.minHeight > 0) c = r.container.height() / 2 - r.startheight * r.bh / 2;
      if (c < 0) c = 0;
      var g = 0;

      if (r.width < r.hideCaptionAtLimit && h.data("captionhidden") == "on") {
        h.addClass("tp-hidden-caption");
        g = 1;
      } else {
        if (r.width < r.hideAllCaptionAtLimit || r.width < r.hideAllCaptionAtLilmit) {
          h.addClass("tp-hidden-caption");
          g = 1;
        } else {
          h.removeClass("tp-hidden-caption");
        }
      }

      if (g == 0) {
        if (h.data("linktoslide") != t && !h.hasClass("hasclicklistener")) {
          h.addClass("hasclicklistener");
          h.css({
            cursor: "pointer"
          });

          if (h.data("linktoslide") != "no") {
            h.click(function () {
              var t = e(this);
              var n = t.data("linktoslide");

              if (n != "next" && n != "prev") {
                r.container.data("showus", n);
                r.container.parent().find(".tp-rightarrow").click();
              } else if (n == "next") r.container.parent().find(".tp-rightarrow").click();else if (n == "prev") r.container.parent().find(".tp-leftarrow").click();
            });
          }
        }

        if (l < 0) l = 0;

        if (h.hasClass("tp-videolayer") || h.find("iframe").length > 0 || h.find("video").length > 0) {
          var y = "iframe" + Math.round(Math.random() * 1e5 + 1),
              b = h.data("videowidth"),
              w = h.data("videoheight"),
              E = h.data("videoattributes"),
              S = h.data("ytid"),
              x = h.data("vimeoid"),
              T = h.data("videpreload"),
              N = h.data("videomp4"),
              C = h.data("videowebm"),
              k = h.data("videoogv"),
              L = h.data("videocontrols"),
              A = "http",
              j = h.data("videoloop") == "loop" ? "loop" : h.data("videoloop") == "loopandnoslidestop" ? "loop" : "";
          if (h.data("thumbimage") != t && h.data("videoposter") == t) h.data("videoposter", h.data("thumbimage"));

          if (S != t && String(S).length > 1 && h.find("iframe").length == 0) {
            A = "https";

            if (L == "none") {
              E = E.replace("controls=1", "controls=0");
              if (E.toLowerCase().indexOf("controls") == -1) E = E + "&controls=0";
            }

            h.append('<iframe style="visible:hidden" src="' + A + "://www.youtube.com/embed/" + S + "?" + E + '" width="' + b + '" height="' + w + '" style="width:' + b + "px;height:" + w + 'px"></iframe>');
          }

          if (x != t && String(x).length > 1 && h.find("iframe").length == 0) {
            if (location.protocol === "https:") A = "https";
            h.append('<iframe style="visible:hidden" src="' + A + "://player.vimeo.com/video/" + x + "?" + E + '" width="' + b + '" height="' + w + '" style="width:' + b + "px;height:" + w + 'px"></iframe>');
          }

          if ((N != t || C != t) && h.find("video").length == 0) {
            if (L != "controls") L = "";
            var I = '<video style="visible:hidden" class="" ' + j + ' preload="' + T + '" width="' + b + '" height="' + w + '"';
            if (h.data("videoposter") != t) if (h.data("videoposter") != t) I = I + 'poster="' + h.data("videoposter") + '">';
            if (C != t && F().toLowerCase() == "firefox") I = I + '<source src="' + C + '" type="video/webm" />';
            if (N != t) I = I + '<source src="' + N + '" type="video/mp4" />';
            if (k != t) I = I + '<source src="' + k + '" type="video/ogg" />';
            I = I + "</video>";
            h.append(I);
            if (L == "controls") h.append('<div class="tp-video-controls">' + '<div class="tp-video-button-wrap"><button type="button" class="tp-video-button tp-vid-play-pause">Play</button></div>' + '<div class="tp-video-seek-bar-wrap"><input  type="range" class="tp-seek-bar" value="0"></div>' + '<div class="tp-video-button-wrap"><button  type="button" class="tp-video-button tp-vid-mute">Mute</button></div>' + '<div class="tp-video-vol-bar-wrap"><input  type="range" class="tp-volume-bar" min="0" max="1" step="0.1" value="1"></div>' + '<div class="tp-video-button-wrap"><button  type="button" class="tp-video-button tp-vid-full-screen">Full-Screen</button></div>' + "</div>");
          }

          var z = false;

          if (h.data("autoplayonlyfirsttime") == true || h.data("autoplayonlyfirsttime") == "true" || h.data("autoplay") == true) {
            h.data("autoplay", true);
            z = true;
          }

          h.find("iframe").each(function () {
            var n = e(this);
            punchgs.TweenLite.to(n, .1, {
              autoAlpha: 1,
              zIndex: 0,
              transformStyle: "preserve-3d",
              z: 0,
              rotationX: 0,
              force3D: "auto"
            });

            if (J()) {
              var o = n.attr("src");
              n.attr("src", "");
              n.attr("src", o);
            }

            r.nextslideatend = h.data("nextslideatend");

            if (h.data("videoposter") != t && h.data("videoposter").length > 2 && h.data("autoplay") != true && !s) {
              if (h.find(".tp-thumb-image").length == 0) h.append('<div class="tp-thumb-image" style="cursor:pointer; position:absolute;top:0px;left:0px;width:100%;height:100%;background-image:url(' + h.data("videoposter") + '); background-size:cover"></div>');else punchgs.TweenLite.set(h.find(".tp-thumb-image"), {
                autoAlpha: 1
              });
            }

            if (n.attr("src").toLowerCase().indexOf("youtube") >= 0) {
              if (!n.hasClass("HasListener")) {
                try {
                  n.attr("id", y);
                  var u;
                  var a = setInterval(function () {
                    if (YT != t) if (_typeof(YT.Player) != t && typeof YT.Player != "undefined") {
                      u = new YT.Player(y, {
                        events: {
                          onStateChange: O,
                          onReady: function onReady(n) {
                            var r = n.target.getVideoEmbedCode(),
                                i = e("#" + r.split('id="')[1].split('"')[0]),
                                s = i.closest(".tp-caption"),
                                o = s.data("videorate"),
                                a = s.data("videostart");
                            if (o != t) n.target.setPlaybackRate(parseFloat(o));

                            if (!J() && s.data("autoplay") == true || z) {
                              s.data("timerplay", setTimeout(function () {
                                n.target.playVideo();
                              }, s.data("start")));
                            }

                            s.find(".tp-thumb-image").click(function () {
                              punchgs.TweenLite.to(e(this), .3, {
                                autoAlpha: 0,
                                force3D: "auto",
                                ease: punchgs.Power3.easeInOut
                              });

                              if (!J()) {
                                u.playVideo();
                              }
                            });
                          }
                        }
                      });
                    }
                    n.addClass("HasListener");
                    h.data("player", u);
                    clearInterval(a);
                  }, 100);
                } catch (f) {}
              } else {
                if (!i) {
                  var u = h.data("player");
                  if (h.data("forcerewind") == "on" && !J()) u.seekTo(0);

                  if (!J() && h.data("autoplay") == true || z) {
                    h.data("timerplay", setTimeout(function () {
                      u.playVideo();
                    }, h.data("start")));
                  }
                }
              }
            } else if (n.attr("src").toLowerCase().indexOf("vimeo") >= 0) {
              if (!n.hasClass("HasListener")) {
                n.addClass("HasListener");
                n.attr("id", y);
                var l = n.attr("src");
                var c = {},
                    p = l,
                    d = /([^&=]+)=([^&]*)/g,
                    v;

                while (v = d.exec(p)) {
                  c[decodeURIComponent(v[1])] = decodeURIComponent(v[2]);
                }

                if (c["player_id"] != t) l = l.replace(c["player_id"], y);else l = l + "&player_id=" + y;

                try {
                  l = l.replace("api=0", "api=1");
                } catch (f) {}

                l = l + "&api=1";
                n.attr("src", l);
                var u = h.find("iframe")[0];
                var m = setInterval(function () {
                  if ($f != t) {
                    if (_typeof($f(y).api) != t && typeof $f(y).api != "undefined") {
                      $f(u).addEvent("ready", function () {
                        _(y, z);
                      });
                      clearInterval(m);
                    }
                  }
                }, 100);
              } else {
                if (!i) {
                  if (!J() && (h.data("autoplay") == true || h.data("forcerewind") == "on")) {
                    var n = h.find("iframe");
                    var g = n.attr("id");
                    var b = $f(g);
                    if (h.data("forcerewind") == "on") b.api("seekTo", 0);
                    h.data("timerplay", setTimeout(function () {
                      if (h.data("autoplay") == true) b.api("play");
                    }, h.data("start")));
                  }
                }
              }
            }
          });
          if (J() && h.data("disablevideoonmobile") == 1 || a(8)) h.find("video").remove();

          if (h.find("video").length > 0) {
            h.find("video").each(function (n) {
              var i = this,
                  s = e(this);
              if (!s.parent().hasClass("html5vid")) s.wrap('<div class="html5vid" style="position:relative;top:0px;left:0px;width:auto;height:auto"></div>');
              var o = s.parent();
              M(i, "loadedmetadata", function (e) {
                e.data("metaloaded", 1);
              }(o));
              clearInterval(o.data("interval"));
              o.data("interval", setInterval(function () {
                if (o.data("metaloaded") == 1 || i.duration != NaN) {
                  clearInterval(o.data("interval"));

                  if (!o.hasClass("HasListener")) {
                    o.addClass("HasListener");
                    if (h.data("dottedoverlay") != "none" && h.data("dottedoverlay") != t) if (h.find(".tp-dottedoverlay").length != 1) o.append('<div class="tp-dottedoverlay ' + h.data("dottedoverlay") + '"></div>');

                    if (s.attr("control") == t) {
                      if (o.find(".tp-video-play-button").length == 0) o.append('<div class="tp-video-play-button"><i class="revicon-right-dir"></i><div class="tp-revstop"></div></div>');
                      o.find("video, .tp-poster, .tp-video-play-button").click(function () {
                        if (o.hasClass("videoisplaying")) i.pause();else i.play();
                      });
                    }

                    if (h.data("forcecover") == 1 || h.hasClass("fullscreenvideo")) {
                      if (h.data("forcecover") == 1) {
                        D(o, r.container);
                        o.addClass("fullcoveredvideo");
                        h.addClass("fullcoveredvideo");
                      }

                      o.css({
                        width: "100%",
                        height: "100%"
                      });
                    }

                    var e = h.find(".tp-vid-play-pause")[0],
                        n = h.find(".tp-vid-mute")[0],
                        u = h.find(".tp-vid-full-screen")[0],
                        a = h.find(".tp-seek-bar")[0],
                        f = h.find(".tp-volume-bar")[0];

                    if (e != t) {
                      M(e, "click", function () {
                        if (i.paused == true) i.play();else i.pause();
                      });
                      M(n, "click", function () {
                        if (i.muted == false) {
                          i.muted = true;
                          n.innerHTML = "Unmute";
                        } else {
                          i.muted = false;
                          n.innerHTML = "Mute";
                        }
                      });
                      M(u, "click", function () {
                        if (i.requestFullscreen) {
                          i.requestFullscreen();
                        } else if (i.mozRequestFullScreen) {
                          i.mozRequestFullScreen();
                        } else if (i.webkitRequestFullscreen) {
                          i.webkitRequestFullscreen();
                        }
                      });
                      M(a, "change", function () {
                        var e = i.duration * (a.value / 100);
                        i.currentTime = e;
                      });
                      M(i, "timeupdate", function () {
                        var e = 100 / i.duration * i.currentTime;
                        a.value = e;
                      });
                      M(a, "mousedown", function () {
                        i.pause();
                      });
                      M(a, "mouseup", function () {
                        i.play();
                      });
                      M(f, "change", function () {
                        i.volume = f.value;
                      });
                    }

                    M(i, "play", function () {
                      if (h.data("volume") == "mute") i.muted = true;
                      o.addClass("videoisplaying");

                      if (h.data("videoloop") == "loopandnoslidestop") {
                        r.videoplaying = false;
                        r.container.trigger("starttimer");
                        r.container.trigger("revolution.slide.onvideostop");
                      } else {
                        r.videoplaying = true;
                        r.container.trigger("stoptimer");
                        r.container.trigger("revolution.slide.onvideoplay");
                      }

                      var e = h.find(".tp-vid-play-pause")[0],
                          n = h.find(".tp-vid-mute")[0];
                      if (e != t) e.innerHTML = "Pause";
                      if (n != t && i.muted) n.innerHTML = "Unmute";
                    });
                    M(i, "pause", function () {
                      o.removeClass("videoisplaying");
                      r.videoplaying = false;
                      r.container.trigger("starttimer");
                      r.container.trigger("revolution.slide.onvideostop");
                      var e = h.find(".tp-vid-play-pause")[0];
                      if (e != t) e.innerHTML = "Play";
                    });
                    M(i, "ended", function () {
                      o.removeClass("videoisplaying");
                      r.videoplaying = false;
                      r.container.trigger("starttimer");
                      r.container.trigger("revolution.slide.onvideostop");
                      if (r.nextslideatend == true) r.container.revnext();
                    });
                  }

                  var l = false;
                  if (h.data("autoplayonlyfirsttime") == true || h.data("autoplayonlyfirsttime") == "true") l = true;
                  var c = 16 / 9;
                  if (h.data("aspectratio") == "4:3") c = 4 / 3;
                  o.data("mediaAspect", c);

                  if (o.closest(".tp-caption").data("forcecover") == 1) {
                    D(o, r.container);
                    o.addClass("fullcoveredvideo");
                  }

                  s.css({
                    display: "block"
                  });
                  r.nextslideatend = h.data("nextslideatend");

                  if (h.data("autoplay") == true || l == true) {
                    if (h.data("videoloop") == "loopandnoslidestop") {
                      r.videoplaying = false;
                      r.container.trigger("starttimer");
                      r.container.trigger("revolution.slide.onvideostop");
                    } else {
                      r.videoplaying = true;
                      r.container.trigger("stoptimer");
                      r.container.trigger("revolution.slide.onvideoplay");
                    }

                    if (h.data("forcerewind") == "on" && !o.hasClass("videoisplaying")) if (i.currentTime > 0) i.currentTime = 0;
                    if (h.data("volume") == "mute") i.muted = true;
                    o.data("timerplay", setTimeout(function () {
                      if (h.data("forcerewind") == "on" && !o.hasClass("videoisplaying")) if (i.currentTime > 0) i.currentTime = 0;
                      if (h.data("volume") == "mute") i.muted = true;
                      i.play();
                    }, 10 + h.data("start")));
                  }

                  if (o.data("ww") == t) o.data("ww", s.attr("width"));
                  if (o.data("hh") == t) o.data("hh", s.attr("height"));

                  if (!h.hasClass("fullscreenvideo") && h.data("forcecover") == 1) {
                    try {
                      o.width(o.data("ww") * r.bw);
                      o.height(o.data("hh") * r.bh);
                    } catch (p) {}
                  }

                  clearInterval(o.data("interval"));
                }
              }), 100);
            });
          }

          if (h.data("autoplay") == true) {
            setTimeout(function () {
              if (h.data("videoloop") != "loopandnoslidestop") {
                r.videoplaying = true;
                r.container.trigger("stoptimer");
              }
            }, 200);

            if (h.data("videoloop") != "loopandnoslidestop") {
              r.videoplaying = true;
              r.container.trigger("stoptimer");
            }

            if (h.data("autoplayonlyfirsttime") == true || h.data("autoplayonlyfirsttime") == "true") {
              h.data("autoplay", false);
              h.data("autoplayonlyfirsttime", false);
            }
          }
        }

        var V = 0;
        var $ = 0;

        if (h.find("img").length > 0) {
          var K = h.find("img");
          if (K.width() == 0) K.css({
            width: "auto"
          });
          if (K.height() == 0) K.css({
            height: "auto"
          });
          if (K.data("ww") == t && K.width() > 0) K.data("ww", K.width());
          if (K.data("hh") == t && K.height() > 0) K.data("hh", K.height());
          var Q = K.data("ww");
          var G = K.data("hh");
          if (Q == t) Q = 0;
          if (G == t) G = 0;
          K.width(Q * r.bw);
          K.height(G * r.bh);
          V = K.width();
          $ = K.height();
        } else {
          if (h.find("iframe").length > 0 || h.find("video").length > 0) {
            var Y = false,
                K = h.find("iframe");

            if (K.length == 0) {
              K = h.find("video");
              Y = true;
            }

            K.css({
              display: "block"
            });
            if (h.data("ww") == t) h.data("ww", K.width());
            if (h.data("hh") == t) h.data("hh", K.height());
            var Q = h.data("ww"),
                G = h.data("hh");
            var Z = h;
            if (Z.data("fsize") == t) Z.data("fsize", parseInt(Z.css("font-size"), 0) || 0);
            if (Z.data("pt") == t) Z.data("pt", parseInt(Z.css("paddingTop"), 0) || 0);
            if (Z.data("pb") == t) Z.data("pb", parseInt(Z.css("paddingBottom"), 0) || 0);
            if (Z.data("pl") == t) Z.data("pl", parseInt(Z.css("paddingLeft"), 0) || 0);
            if (Z.data("pr") == t) Z.data("pr", parseInt(Z.css("paddingRight"), 0) || 0);
            if (Z.data("mt") == t) Z.data("mt", parseInt(Z.css("marginTop"), 0) || 0);
            if (Z.data("mb") == t) Z.data("mb", parseInt(Z.css("marginBottom"), 0) || 0);
            if (Z.data("ml") == t) Z.data("ml", parseInt(Z.css("marginLeft"), 0) || 0);
            if (Z.data("mr") == t) Z.data("mr", parseInt(Z.css("marginRight"), 0) || 0);
            if (Z.data("bt") == t) Z.data("bt", parseInt(Z.css("borderTop"), 0) || 0);
            if (Z.data("bb") == t) Z.data("bb", parseInt(Z.css("borderBottom"), 0) || 0);
            if (Z.data("bl") == t) Z.data("bl", parseInt(Z.css("borderLeft"), 0) || 0);
            if (Z.data("br") == t) Z.data("br", parseInt(Z.css("borderRight"), 0) || 0);
            if (Z.data("lh") == t) Z.data("lh", parseInt(Z.css("lineHeight"), 0) || 0);
            if (Z.data("lh") == "auto") Z.data("lh", Z.data("fsize") + 4);
            var et = r.width,
                tt = r.height;
            if (et > r.startwidth) et = r.startwidth;
            if (tt > r.startheight) tt = r.startheight;
            if (!h.hasClass("fullscreenvideo")) h.css({
              "font-size": Z.data("fsize") * r.bw + "px",
              "padding-top": Z.data("pt") * r.bh + "px",
              "padding-bottom": Z.data("pb") * r.bh + "px",
              "padding-left": Z.data("pl") * r.bw + "px",
              "padding-right": Z.data("pr") * r.bw + "px",
              "margin-top": Z.data("mt") * r.bh + "px",
              "margin-bottom": Z.data("mb") * r.bh + "px",
              "margin-left": Z.data("ml") * r.bw + "px",
              "margin-right": Z.data("mr") * r.bw + "px",
              "border-top": Z.data("bt") * r.bh + "px",
              "border-bottom": Z.data("bb") * r.bh + "px",
              "border-left": Z.data("bl") * r.bw + "px",
              "border-right": Z.data("br") * r.bw + "px",
              "line-height": Z.data("lh") * r.bh + "px",
              height: G * r.bh + "px"
            });else {
              l = 0;
              c = 0;
              h.data("x", 0);
              h.data("y", 0);
              var nt = r.height;
              if (r.autoHeight == "on") nt = r.container.height();
              h.css({
                width: r.width,
                height: nt
              });
            }

            if (Y == false) {
              K.width(Q * r.bw);
              K.height(G * r.bh);
            } else if (h.data("forcecover") != 1 && !h.hasClass("fullscreenvideo")) {
              K.width(Q * r.bw);
              K.height(G * r.bh);
            }

            V = K.width();
            $ = K.height();
          } else {
            h.find(".tp-resizeme, .tp-resizeme *").each(function () {
              q(e(this), r);
            });

            if (h.hasClass("tp-resizeme")) {
              h.find("*").each(function () {
                q(e(this), r);
              });
            }

            q(h, r);
            $ = h.outerHeight(true);
            V = h.outerWidth(true);
            var rt = h.outerHeight();
            var it = h.css("backgroundColor");
            h.find(".frontcorner").css({
              borderWidth: rt + "px",
              left: 0 - rt + "px",
              borderRight: "0px solid transparent",
              borderTopColor: it
            });
            h.find(".frontcornertop").css({
              borderWidth: rt + "px",
              left: 0 - rt + "px",
              borderRight: "0px solid transparent",
              borderBottomColor: it
            });
            h.find(".backcorner").css({
              borderWidth: rt + "px",
              right: 0 - rt + "px",
              borderLeft: "0px solid transparent",
              borderBottomColor: it
            });
            h.find(".backcornertop").css({
              borderWidth: rt + "px",
              right: 0 - rt + "px",
              borderLeft: "0px solid transparent",
              borderTopColor: it
            });
          }
        }

        if (r.fullScreenAlignForce == "on") {
          l = 0;
          c = 0;
        }

        if (h.data("voffset") == t) h.data("voffset", 0);
        if (h.data("hoffset") == t) h.data("hoffset", 0);
        var st = h.data("voffset") * v;
        var ot = h.data("hoffset") * v;
        var ut = r.startwidth * v;
        var at = r.startheight * v;

        if (r.fullScreenAlignForce == "on") {
          ut = r.container.width();
          at = r.container.height();
        }

        if (h.data("x") == "center" || h.data("xcenter") == "center") {
          h.data("xcenter", "center");
          h.data("x", ut / 2 - h.outerWidth(true) / 2 + ot);
        }

        if (h.data("x") == "left" || h.data("xleft") == "left") {
          h.data("xleft", "left");
          h.data("x", 0 / v + ot);
        }

        if (h.data("x") == "right" || h.data("xright") == "right") {
          h.data("xright", "right");
          h.data("x", (ut - h.outerWidth(true) + ot) / v);
        }

        if (h.data("y") == "center" || h.data("ycenter") == "center") {
          h.data("ycenter", "center");
          h.data("y", at / 2 - h.outerHeight(true) / 2 + st);
        }

        if (h.data("y") == "top" || h.data("ytop") == "top") {
          h.data("ytop", "top");
          h.data("y", 0 / r.bh + st);
        }

        if (h.data("y") == "bottom" || h.data("ybottom") == "bottom") {
          h.data("ybottom", "bottom");
          h.data("y", (at - h.outerHeight(true) + st) / v);
        }

        if (h.data("start") == t) h.data("start", 1e3);
        var ft = h.data("easing");
        if (ft == t) ft = "punchgs.Power1.easeOut";
        var lt = h.data("start") / 1e3,
            ct = h.data("speed") / 1e3;
        if (h.data("x") == "center" || h.data("xcenter") == "center") var ht = h.data("x") + l;else {
          var ht = v * h.data("x") + l;
        }
        if (h.data("y") == "center" || h.data("ycenter") == "center") var pt = h.data("y") + c;else {
          var pt = r.bh * h.data("y") + c;
        }
        punchgs.TweenLite.set(h, {
          top: pt,
          left: ht,
          overwrite: "auto"
        });
        if (f == 0) s = true;

        if (h.data("timeline") != t && !s) {
          if (f != 2) h.data("timeline").gotoAndPlay(0);
          s = true;
        }

        if (!s) {
          if (h.data("timeline") != t) {}

          var dt = new punchgs.TimelineLite({
            smoothChildTiming: true,
            onStart: u
          });
          dt.pause();

          if (r.fullScreenAlignForce == "on") {}

          var vt = h;
          if (h.data("mySplitText") != t) h.data("mySplitText").revert();

          if (h.data("splitin") == "chars" || h.data("splitin") == "words" || h.data("splitin") == "lines" || h.data("splitout") == "chars" || h.data("splitout") == "words" || h.data("splitout") == "lines") {
            if (h.find("a").length > 0) h.data("mySplitText", new punchgs.SplitText(h.find("a"), {
              type: "lines,words,chars",
              charsClass: "tp-splitted",
              wordsClass: "tp-splitted",
              linesClass: "tp-splitted"
            }));else if (h.find(".tp-layer-inner-rotation").length > 0) h.data("mySplitText", new punchgs.SplitText(h.find(".tp-layer-inner-rotation"), {
              type: "lines,words,chars",
              charsClass: "tp-splitted",
              wordsClass: "tp-splitted",
              linesClass: "tp-splitted"
            }));else h.data("mySplitText", new punchgs.SplitText(h, {
              type: "lines,words,chars",
              charsClass: "tp-splitted",
              wordsClass: "tp-splitted",
              linesClass: "tp-splitted"
            }));
            h.addClass("splitted");
          }

          if (h.data("splitin") == "chars") vt = h.data("mySplitText").chars;
          if (h.data("splitin") == "words") vt = h.data("mySplitText").words;
          if (h.data("splitin") == "lines") vt = h.data("mySplitText").lines;
          var mt = P();
          var gt = P();
          if (h.data("repeat") != t) repeatV = h.data("repeat");
          if (h.data("yoyo") != t) yoyoV = h.data("yoyo");
          if (h.data("repeatdelay") != t) repeatdelayV = h.data("repeatdelay");
          var yt = h.attr("class");
          if (yt.match("customin")) mt = H(mt, h.data("customin"));else if (yt.match("randomrotate")) {
            mt.scale = Math.random() * 3 + 1;
            mt.rotation = Math.round(Math.random() * 200 - 100);
            mt.x = Math.round(Math.random() * 200 - 100);
            mt.y = Math.round(Math.random() * 200 - 100);
          } else if (yt.match("lfr") || yt.match("skewfromright")) mt.x = 15 + r.width;else if (yt.match("lfl") || yt.match("skewfromleft")) mt.x = -15 - V;else if (yt.match("sfl") || yt.match("skewfromleftshort")) mt.x = -50;else if (yt.match("sfr") || yt.match("skewfromrightshort")) mt.x = 50;else if (yt.match("lft")) mt.y = -25 - $;else if (yt.match("lfb")) mt.y = 25 + r.height;else if (yt.match("sft")) mt.y = -50;else if (yt.match("sfb")) mt.y = 50;
          if (yt.match("skewfromright") || h.hasClass("skewfromrightshort")) mt.skewX = -85;else if (yt.match("skewfromleft") || h.hasClass("skewfromleftshort")) mt.skewX = 85;
          if (yt.match("fade") || yt.match("sft") || yt.match("sfl") || yt.match("sfb") || yt.match("skewfromleftshort") || yt.match("sfr") || yt.match("skewfromrightshort")) mt.opacity = 0;

          if (F().toLowerCase() == "safari") {}

          var bt = h.data("elementdelay") == t ? 0 : h.data("elementdelay");
          gt.ease = mt.ease = h.data("easing") == t ? punchgs.Power1.easeInOut : h.data("easing");
          mt.data = new Object();
          mt.data.oldx = mt.x;
          mt.data.oldy = mt.y;
          gt.data = new Object();
          gt.data.oldx = gt.x;
          gt.data.oldy = gt.y;
          mt.x = mt.x * v;
          mt.y = mt.y * v;
          var wt = new punchgs.TimelineLite();

          if (f != 2) {
            if (yt.match("customin")) {
              if (vt != h) dt.add(punchgs.TweenLite.set(h, {
                force3D: "auto",
                opacity: 1,
                scaleX: 1,
                scaleY: 1,
                rotationX: 0,
                rotationY: 0,
                rotationZ: 0,
                skewX: 0,
                skewY: 0,
                z: 0,
                x: 0,
                y: 0,
                visibility: "visible",
                delay: 0,
                overwrite: "all"
              }));
              mt.visibility = "hidden";
              gt.visibility = "visible";
              gt.overwrite = "all";
              gt.opacity = 1;
              gt.onComplete = o();
              gt.delay = lt;
              gt.force3D = "auto";
              dt.add(wt.staggerFromTo(vt, ct, mt, gt, bt), "frame0");
            } else {
              mt.visibility = "visible";
              mt.transformPerspective = 600;
              if (vt != h) dt.add(punchgs.TweenLite.set(h, {
                force3D: "auto",
                opacity: 1,
                scaleX: 1,
                scaleY: 1,
                rotationX: 0,
                rotationY: 0,
                rotationZ: 0,
                skewX: 0,
                skewY: 0,
                z: 0,
                x: 0,
                y: 0,
                visibility: "visible",
                delay: 0,
                overwrite: "all"
              }));
              gt.visibility = "visible";
              gt.delay = lt;
              gt.onComplete = o();
              gt.opacity = 1;
              gt.force3D = "auto";

              if (yt.match("randomrotate") && vt != h) {
                for (var n = 0; n < vt.length; n++) {
                  var Et = new Object();
                  var St = new Object();
                  e.extend(Et, mt);
                  e.extend(St, gt);
                  mt.scale = Math.random() * 3 + 1;
                  mt.rotation = Math.round(Math.random() * 200 - 100);
                  mt.x = Math.round(Math.random() * 200 - 100);
                  mt.y = Math.round(Math.random() * 200 - 100);
                  if (n != 0) St.delay = lt + n * bt;
                  dt.append(punchgs.TweenLite.fromTo(vt[n], ct, Et, St), "frame0");
                }
              } else dt.add(wt.staggerFromTo(vt, ct, mt, gt, bt), "frame0");
            }
          }

          h.data("timeline", dt);
          var xt = new Array();

          if (h.data("frames") != t) {
            var Tt = h.data("frames");
            Tt = Tt.replace(/\s+/g, "");
            Tt = Tt.replace("{", "");
            var Nt = Tt.split("}");
            e.each(Nt, function (e, t) {
              if (t.length > 0) {
                var n = B(t);
                W(h, r, n, "frame" + (e + 10), v);
              }
            });
          }

          dt = h.data("timeline");

          if (h.data("end") != t && (f == -1 || f == 2)) {
            X(h, r, h.data("end") / 1e3, mt, "frame99", v);
          } else {
            if (f == -1 || f == 2) X(h, r, 999999, mt, "frame99", v);else X(h, r, 200, mt, "frame99", v);
          }

          dt = h.data("timeline");
          h.data("timeline", dt);
          R(h, v);
          dt.resume();
        }
      }

      if (s) {
        U(h);
        R(h, v);

        if (h.data("timeline") != t) {
          var Ct = h.data("timeline").getTweensOf();
          e.each(Ct, function (e, n) {
            if (n.vars.data != t) {
              var r = n.vars.data.oldx * v;
              var i = n.vars.data.oldy * v;

              if (n.progress() != 1 && n.progress() != 0) {
                try {
                  n.vars.x = r;
                  n.vary.y = i;
                } catch (s) {}
              } else {
                if (n.progress() == 1) {
                  punchgs.TweenLite.set(n.target, {
                    x: r,
                    y: i
                  });
                }
              }
            }
          });
        }
      }
    });
    var d = e("body").find("#" + r.container.attr("id")).find(".tp-bannertimer");
    d.data("opt", r);
    if (s != t) setTimeout(function () {
      s.resume();
    }, 30);
  };

  var F = function F() {
    var e = navigator.appName,
        t = navigator.userAgent,
        n;
    var r = t.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
    if (r && (n = t.match(/version\/([\.\d]+)/i)) != null) r[2] = n[1];
    r = r ? [r[1], r[2]] : [e, navigator.appVersion, "-?"];
    return r[0];
  };

  var I = function I() {
    var e = navigator.appName,
        t = navigator.userAgent,
        n;
    var r = t.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
    if (r && (n = t.match(/version\/([\.\d]+)/i)) != null) r[2] = n[1];
    r = r ? [r[1], r[2]] : [e, navigator.appVersion, "-?"];
    return r[1];
  };

  var q = function q(e, n) {
    if (e.data("fsize") == t) e.data("fsize", parseInt(e.css("font-size"), 0) || 0);
    if (e.data("pt") == t) e.data("pt", parseInt(e.css("paddingTop"), 0) || 0);
    if (e.data("pb") == t) e.data("pb", parseInt(e.css("paddingBottom"), 0) || 0);
    if (e.data("pl") == t) e.data("pl", parseInt(e.css("paddingLeft"), 0) || 0);
    if (e.data("pr") == t) e.data("pr", parseInt(e.css("paddingRight"), 0) || 0);
    if (e.data("mt") == t) e.data("mt", parseInt(e.css("marginTop"), 0) || 0);
    if (e.data("mb") == t) e.data("mb", parseInt(e.css("marginBottom"), 0) || 0);
    if (e.data("ml") == t) e.data("ml", parseInt(e.css("marginLeft"), 0) || 0);
    if (e.data("mr") == t) e.data("mr", parseInt(e.css("marginRight"), 0) || 0);
    if (e.data("bt") == t) e.data("bt", parseInt(e.css("borderTopWidth"), 0) || 0);
    if (e.data("bb") == t) e.data("bb", parseInt(e.css("borderBottomWidth"), 0) || 0);
    if (e.data("bl") == t) e.data("bl", parseInt(e.css("borderLeftWidth"), 0) || 0);
    if (e.data("br") == t) e.data("br", parseInt(e.css("borderRightWidth"), 0) || 0);
    if (e.data("ls") == t) e.data("ls", parseInt(e.css("letterSpacing"), 0) || 0);
    if (e.data("lh") == t) e.data("lh", parseInt(e.css("lineHeight"), 0) || "auto");
    if (e.data("minwidth") == t) e.data("minwidth", parseInt(e.css("minWidth"), 0) || 0);
    if (e.data("minheight") == t) e.data("minheight", parseInt(e.css("minHeight"), 0) || 0);
    if (e.data("maxwidth") == t) e.data("maxwidth", parseInt(e.css("maxWidth"), 0) || "none");
    if (e.data("maxheight") == t) e.data("maxheight", parseInt(e.css("maxHeight"), 0) || "none");
    if (e.data("wii") == t) e.data("wii", parseInt(e.css("width"), 0) || 0);
    if (e.data("hii") == t) e.data("hii", parseInt(e.css("height"), 0) || 0);
    if (e.data("wan") == t) e.data("wan", e.css("-webkit-transition"));
    if (e.data("moan") == t) e.data("moan", e.css("-moz-animation-transition"));
    if (e.data("man") == t) e.data("man", e.css("-ms-animation-transition"));
    if (e.data("ani") == t) e.data("ani", e.css("transition"));
    if (e.data("lh") == "auto") e.data("lh", e.data("fsize") + 4);

    if (!e.hasClass("tp-splitted")) {
      e.css("-webkit-transition", "none");
      e.css("-moz-transition", "none");
      e.css("-ms-transition", "none");
      e.css("transition", "none");
      punchgs.TweenLite.set(e, {
        fontSize: Math.round(e.data("fsize") * n.bw) + "px",
        letterSpacing: Math.floor(e.data("ls") * n.bw) + "px",
        paddingTop: Math.round(e.data("pt") * n.bh) + "px",
        paddingBottom: Math.round(e.data("pb") * n.bh) + "px",
        paddingLeft: Math.round(e.data("pl") * n.bw) + "px",
        paddingRight: Math.round(e.data("pr") * n.bw) + "px",
        marginTop: e.data("mt") * n.bh + "px",
        marginBottom: e.data("mb") * n.bh + "px",
        marginLeft: e.data("ml") * n.bw + "px",
        marginRight: e.data("mr") * n.bw + "px",
        borderTopWidth: Math.round(e.data("bt") * n.bh) + "px",
        borderBottomWidth: Math.round(e.data("bb") * n.bh) + "px",
        borderLeftWidth: Math.round(e.data("bl") * n.bw) + "px",
        borderRightWidth: Math.round(e.data("br") * n.bw) + "px",
        lineHeight: Math.round(e.data("lh") * n.bh) + "px",
        minWidth: e.data("minwidth") * n.bw + "px",
        minHeight: e.data("minheight") * n.bh + "px",
        overwrite: "auto"
      });
      setTimeout(function () {
        e.css("-webkit-transition", e.data("wan"));
        e.css("-moz-transition", e.data("moan"));
        e.css("-ms-transition", e.data("man"));
        e.css("transition", e.data("ani"));
      }, 30);
      if (e.data("maxheight") != "none") e.css({
        maxHeight: e.data("maxheight") * n.bh + "px"
      });
      if (e.data("maxwidth") != "none") e.css({
        maxWidth: e.data("maxwidth") * n.bw + "px"
      });
    }
  };

  var R = function R(n, r) {
    n.find(".rs-pendulum").each(function () {
      var n = e(this);

      if (n.data("timeline") == t) {
        n.data("timeline", new punchgs.TimelineLite());
        var i = n.data("startdeg") == t ? -20 : n.data("startdeg"),
            s = n.data("enddeg") == t ? 20 : n.data("enddeg"),
            o = n.data("speed") == t ? 2 : n.data("speed"),
            u = n.data("origin") == t ? "50% 50%" : n.data("origin"),
            a = n.data("easing") == t ? punchgs.Power2.easeInOut : n.data("ease");
        i = i * r;
        s = s * r;
        n.data("timeline").append(new punchgs.TweenLite.fromTo(n, o, {
          force3D: "auto",
          rotation: i,
          transformOrigin: u
        }, {
          rotation: s,
          ease: a
        }));
        n.data("timeline").append(new punchgs.TweenLite.fromTo(n, o, {
          force3D: "auto",
          rotation: s,
          transformOrigin: u
        }, {
          rotation: i,
          ease: a,
          onComplete: function onComplete() {
            n.data("timeline").restart();
          }
        }));
      }
    });
    n.find(".rs-rotate").each(function () {
      var n = e(this);

      if (n.data("timeline") == t) {
        n.data("timeline", new punchgs.TimelineLite());
        var i = n.data("startdeg") == t ? 0 : n.data("startdeg"),
            s = n.data("enddeg") == t ? 360 : n.data("enddeg");
        speed = n.data("speed") == t ? 2 : n.data("speed"), origin = n.data("origin") == t ? "50% 50%" : n.data("origin"), easing = n.data("easing") == t ? punchgs.Power2.easeInOut : n.data("easing");
        i = i * r;
        s = s * r;
        n.data("timeline").append(new punchgs.TweenLite.fromTo(n, speed, {
          force3D: "auto",
          rotation: i,
          transformOrigin: origin
        }, {
          rotation: s,
          ease: easing,
          onComplete: function onComplete() {
            n.data("timeline").restart();
          }
        }));
      }
    });
    n.find(".rs-slideloop").each(function () {
      var n = e(this);

      if (n.data("timeline") == t) {
        n.data("timeline", new punchgs.TimelineLite());
        var i = n.data("xs") == t ? 0 : n.data("xs"),
            s = n.data("ys") == t ? 0 : n.data("ys"),
            o = n.data("xe") == t ? 0 : n.data("xe"),
            u = n.data("ye") == t ? 0 : n.data("ye"),
            a = n.data("speed") == t ? 2 : n.data("speed"),
            f = n.data("easing") == t ? punchgs.Power2.easeInOut : n.data("easing");
        i = i * r;
        s = s * r;
        o = o * r;
        u = u * r;
        n.data("timeline").append(new punchgs.TweenLite.fromTo(n, a, {
          force3D: "auto",
          x: i,
          y: s
        }, {
          x: o,
          y: u,
          ease: f
        }));
        n.data("timeline").append(new punchgs.TweenLite.fromTo(n, a, {
          force3D: "auto",
          x: o,
          y: u
        }, {
          x: i,
          y: s,
          onComplete: function onComplete() {
            n.data("timeline").restart();
          }
        }));
      }
    });
    n.find(".rs-pulse").each(function () {
      var n = e(this);

      if (n.data("timeline") == t) {
        n.data("timeline", new punchgs.TimelineLite());
        var r = n.data("zoomstart") == t ? 0 : n.data("zoomstart"),
            i = n.data("zoomend") == t ? 0 : n.data("zoomend"),
            s = n.data("speed") == t ? 2 : n.data("speed"),
            o = n.data("easing") == t ? punchgs.Power2.easeInOut : n.data("easing");
        n.data("timeline").append(new punchgs.TweenLite.fromTo(n, s, {
          force3D: "auto",
          scale: r
        }, {
          scale: i,
          ease: o
        }));
        n.data("timeline").append(new punchgs.TweenLite.fromTo(n, s, {
          force3D: "auto",
          scale: i
        }, {
          scale: r,
          onComplete: function onComplete() {
            n.data("timeline").restart();
          }
        }));
      }
    });
    n.find(".rs-wave").each(function () {
      var n = e(this);

      if (n.data("timeline") == t) {
        n.data("timeline", new punchgs.TimelineLite());
        var i = n.data("angle") == t ? 10 : n.data("angle"),
            s = n.data("radius") == t ? 10 : n.data("radius"),
            o = n.data("speed") == t ? -20 : n.data("speed"),
            u = n.data("origin") == t ? -20 : n.data("origin");
        i = i * r;
        s = s * r;
        var a = {
          a: 0,
          ang: i,
          element: n,
          unit: s
        };
        n.data("timeline").append(new punchgs.TweenLite.fromTo(a, o, {
          a: 360
        }, {
          a: 0,
          force3D: "auto",
          ease: punchgs.Linear.easeNone,
          onUpdate: function onUpdate() {
            var e = a.a * (Math.PI / 180);
            punchgs.TweenLite.to(a.element, .1, {
              force3D: "auto",
              x: Math.cos(e) * a.unit,
              y: a.unit * (1 - Math.sin(e))
            });
          },
          onComplete: function onComplete() {
            n.data("timeline").restart();
          }
        }));
      }
    });
  };

  var U = function U(n) {
    n.find(".rs-pendulum, .rs-slideloop, .rs-pulse, .rs-wave").each(function () {
      var n = e(this);

      if (n.data("timeline") != t) {
        n.data("timeline").pause();
        n.data("timeline", null);
      }
    });
  };

  var z = function z(n, r) {
    var i = 0;
    var s = n.find(".tp-caption"),
        o = r.container.find(".tp-static-layers").find(".tp-caption");
    e.each(o, function (e, t) {
      s.push(t);
    });
    s.each(function (n) {
      var s = -1;
      var o = e(this);

      if (o.hasClass("tp-static-layer")) {
        if (o.data("startslide") == -1 || o.data("startslide") == "-1") o.data("startslide", 0);
        if (o.data("endslide") == -1 || o.data("endslide") == "-1") o.data("endslide", r.slideamount);

        if (o.hasClass("tp-is-shown")) {
          if (o.data("startslide") > r.next || o.data("endslide") < r.next) {
            s = 2;
            o.removeClass("tp-is-shown");
          } else {
            s = 0;
          }
        } else {
          s = 2;
        }
      }

      if (s != 0) {
        U(o);

        if (o.find("iframe").length > 0) {
          punchgs.TweenLite.to(o.find("iframe"), .2, {
            autoAlpha: 0
          });
          if (J()) o.find("iframe").remove();

          try {
            var u = o.find("iframe");
            var a = u.attr("id");
            var f = $f(a);
            f.api("pause");
            clearTimeout(o.data("timerplay"));
          } catch (l) {}

          try {
            var c = o.data("player");
            c.stopVideo();
            clearTimeout(o.data("timerplay"));
          } catch (l) {}
        }

        if (o.find("video").length > 0) {
          try {
            o.find("video").each(function (t) {
              var n = e(this).parent();
              var r = n.attr("id");
              clearTimeout(n.data("timerplay"));
              var i = this;
              i.pause();
            });
          } catch (l) {}
        }

        try {
          var h = o.data("timeline");
          var p = h.getLabelTime("frame99");
          var d = h.time();

          if (p > d) {
            var v = h.getTweensOf(o);
            e.each(v, function (e, t) {
              if (e != 0) t.pause();
            });

            if (o.css("opacity") != 0) {
              var m = o.data("endspeed") == t ? o.data("speed") : o.data("endspeed");
              if (m > i) i = m;
              h.play("frame99");
            } else h.progress(1, false);
          }
        } catch (l) {}
      }
    });
    return i;
  };

  var W = function W(e, n, r, i, s) {
    var o = e.data("timeline");
    var u = new punchgs.TimelineLite();
    var a = e;
    if (r.typ == "chars") a = e.data("mySplitText").chars;else if (r.typ == "words") a = e.data("mySplitText").words;else if (r.typ == "lines") a = e.data("mySplitText").lines;
    r.animation.ease = r.ease;
    if (r.animation.rotationZ != t) r.animation.rotation = r.animation.rotationZ;
    r.animation.data = new Object();
    r.animation.data.oldx = r.animation.x;
    r.animation.data.oldy = r.animation.y;
    r.animation.x = r.animation.x * s;
    r.animation.y = r.animation.y * s;
    o.add(u.staggerTo(a, r.speed, r.animation, r.elementdelay), r.start);
    o.addLabel(i, r.start);
    e.data("timeline", o);
  };

  var X = function X(e, n, r, i, s, o) {
    var u = e.data("timeline"),
        a = new punchgs.TimelineLite();
    var f = P(),
        l = e.data("endspeed") == t ? e.data("speed") : e.data("endspeed"),
        c = e.attr("class");
    f.ease = e.data("endeasing") == t ? punchgs.Power1.easeInOut : e.data("endeasing");
    l = l / 1e3;

    if (c.match("ltr") || c.match("ltl") || c.match("str") || c.match("stl") || c.match("ltt") || c.match("ltb") || c.match("stt") || c.match("stb") || c.match("skewtoright") || c.match("skewtorightshort") || c.match("skewtoleft") || c.match("skewtoleftshort") || c.match("fadeout") || c.match("randomrotateout")) {
      if (c.match("skewtoright") || c.match("skewtorightshort")) f.skewX = 35;else if (c.match("skewtoleft") || c.match("skewtoleftshort")) f.skewX = -35;
      if (c.match("ltr") || c.match("skewtoright")) f.x = n.width + 60;else if (c.match("ltl") || c.match("skewtoleft")) f.x = 0 - (n.width + 60);else if (c.match("ltt")) f.y = 0 - (n.height + 60);else if (c.match("ltb")) f.y = n.height + 60;else if (c.match("str") || c.match("skewtorightshort")) {
        f.x = 50;
        f.opacity = 0;
      } else if (c.match("stl") || c.match("skewtoleftshort")) {
        f.x = -50;
        f.opacity = 0;
      } else if (c.match("stt")) {
        f.y = -50;
        f.opacity = 0;
      } else if (c.match("stb")) {
        f.y = 50;
        f.opacity = 0;
      } else if (c.match("randomrotateout")) {
        f.x = Math.random() * n.width;
        f.y = Math.random() * n.height;
        f.scale = Math.random() * 2 + .3;
        f.rotation = Math.random() * 360 - 180;
        f.opacity = 0;
      } else if (c.match("fadeout")) {
        f.opacity = 0;
      }
      if (c.match("skewtorightshort")) f.x = 270;else if (c.match("skewtoleftshort")) f.x = -270;
      f.data = new Object();
      f.data.oldx = f.x;
      f.data.oldy = f.y;
      f.x = f.x * o;
      f.y = f.y * o;
      f.overwrite = "auto";
      var h = e;
      var h = e;
      if (e.data("splitout") == "chars") h = e.data("mySplitText").chars;else if (e.data("splitout") == "words") h = e.data("mySplitText").words;else if (e.data("splitout") == "lines") h = e.data("mySplitText").lines;
      var p = e.data("endelementdelay") == t ? 0 : e.data("endelementdelay");
      u.add(a.staggerTo(h, l, f, p), r);
    } else if (e.hasClass("customout")) {
      f = H(f, e.data("customout"));
      var h = e;
      if (e.data("splitout") == "chars") h = e.data("mySplitText").chars;else if (e.data("splitout") == "words") h = e.data("mySplitText").words;else if (e.data("splitout") == "lines") h = e.data("mySplitText").lines;
      var p = e.data("endelementdelay") == t ? 0 : e.data("endelementdelay");

      f.onStart = function () {
        punchgs.TweenLite.set(e, {
          transformPerspective: f.transformPerspective,
          transformOrigin: f.transformOrigin,
          overwrite: "auto"
        });
      };

      f.data = new Object();
      f.data.oldx = f.x;
      f.data.oldy = f.y;
      f.x = f.x * o;
      f.y = f.y * o;
      u.add(a.staggerTo(h, l, f, p), r);
    } else {
      i.delay = 0;
      u.add(punchgs.TweenLite.to(e, l, i), r);
    }

    u.addLabel(s, r);
    e.data("timeline", u);
  };

  var V = function V(t, n) {
    t.children().each(function () {
      try {
        e(this).die("click");
      } catch (t) {}

      try {
        e(this).die("mouseenter");
      } catch (t) {}

      try {
        e(this).die("mouseleave");
      } catch (t) {}

      try {
        e(this).unbind("hover");
      } catch (t) {}
    });

    try {
      t.die("click", "mouseenter", "mouseleave");
    } catch (r) {}

    clearInterval(n.cdint);
    t = null;
  };

  var $ = function $(n, r) {
    r.cd = 0;
    r.loop = 0;
    if (r.stopAfterLoops != t && r.stopAfterLoops > -1) r.looptogo = r.stopAfterLoops;else r.looptogo = 9999999;
    if (r.stopAtSlide != t && r.stopAtSlide > -1) r.lastslidetoshow = r.stopAtSlide;else r.lastslidetoshow = 999;
    r.stopLoop = "off";
    if (r.looptogo == 0) r.stopLoop = "on";

    if (r.slideamount > 1 && !(r.stopAfterLoops == 0 && r.stopAtSlide == 1)) {
      var i = n.find(".tp-bannertimer");
      n.on("stoptimer", function () {
        var t = e(this).find(".tp-bannertimer");
        t.data("tween").pause();
        if (r.hideTimerBar == "on") t.css({
          visibility: "hidden"
        });
      });
      n.on("starttimer", function () {
        if (r.conthover != 1 && r.videoplaying != true && r.width > r.hideSliderAtLimit && r.bannertimeronpause != true && r.overnav != true) if (r.stopLoop == "on" && r.next == r.lastslidetoshow - 1 || r.noloopanymore == 1) r.noloopanymore = 1;else {
          i.css({
            visibility: "visible"
          });
          i.data("tween").resume();
        }
        if (r.hideTimerBar == "on") i.css({
          visibility: "hidden"
        });
      });
      n.on("restarttimer", function () {
        var t = e(this).find(".tp-bannertimer");
        if (r.stopLoop == "on" && r.next == r.lastslidetoshow - 1 || r.noloopanymore == 1) r.noloopanymore = 1;else {
          t.css({
            visibility: "visible"
          });
          t.data("tween").kill();
          t.data("tween", punchgs.TweenLite.fromTo(t, r.delay / 1e3, {
            width: "0%"
          }, {
            force3D: "auto",
            width: "100%",
            ease: punchgs.Linear.easeNone,
            onComplete: s,
            delay: 1
          }));
        }
        if (r.hideTimerBar == "on") t.css({
          visibility: "hidden"
        });
      });
      n.on("nulltimer", function () {
        i.data("tween").pause(0);
        if (r.hideTimerBar == "on") i.css({
          visibility: "hidden"
        });
      });

      var s = function s() {
        if (e("body").find(n).length == 0) {
          V(n, r);
          clearInterval(r.cdint);
        }

        n.trigger("revolution.slide.slideatend");

        if (n.data("conthover-changed") == 1) {
          r.conthover = n.data("conthover");
          n.data("conthover-changed", 0);
        }

        r.act = r.next;
        r.next = r.next + 1;

        if (r.next > n.find(">ul >li").length - 1) {
          r.next = 0;
          r.looptogo = r.looptogo - 1;

          if (r.looptogo <= 0) {
            r.stopLoop = "on";
          }
        }

        if (r.stopLoop == "on" && r.next == r.lastslidetoshow - 1) {
          n.find(".tp-bannertimer").css({
            visibility: "hidden"
          });
          n.trigger("revolution.slide.onstop");
          r.noloopanymore = 1;
        } else {
          i.data("tween").restart();
        }

        N(n, r);
      };

      i.data("tween", punchgs.TweenLite.fromTo(i, r.delay / 1e3, {
        width: "0%"
      }, {
        force3D: "auto",
        width: "100%",
        ease: punchgs.Linear.easeNone,
        onComplete: s,
        delay: 1
      }));
      i.data("opt", r);
      n.hover(function () {
        if (r.onHoverStop == "on" && !J()) {
          n.trigger("stoptimer");
          n.trigger("revolution.slide.onpause");
          var i = n.find(">ul >li:eq(" + r.next + ") .slotholder");
          i.find(".defaultimg").each(function () {
            var n = e(this);

            if (n.data("kenburn") != t) {
              n.data("kenburn").pause();
            }
          });
        }
      }, function () {
        if (n.data("conthover") != 1) {
          n.trigger("revolution.slide.onresume");
          n.trigger("starttimer");
          var i = n.find(">ul >li:eq(" + r.next + ") .slotholder");
          i.find(".defaultimg").each(function () {
            var n = e(this);

            if (n.data("kenburn") != t) {
              n.data("kenburn").play();
            }
          });
        }
      });
    }
  };

  var J = function J() {
    var e = ["android", "webos", "iphone", "ipad", "blackberry", "Android", "webos",, "iPod", "iPhone", "iPad", "Blackberry", "BlackBerry"];
    var t = false;

    for (var n in e) {
      if (navigator.userAgent.split(e[n]).length > 1) {
        t = true;
      }
    }

    return t;
  };

  var K = function K(e, t, n) {
    var r = t.data("owidth");
    var i = t.data("oheight");

    if (r / i > n.width / n.height) {
      var s = n.container.width() / r;
      var o = i * s;
      var u = o / n.container.height() * e;
      e = e * (100 / u);
      u = 100;
      e = e;
      return e + "% " + u + "%" + " 1";
    } else {
      var s = n.container.width() / r;
      var o = i * s;
      var u = o / n.container.height() * e;
      return e + "% " + u + "%";
    }
  };

  var Q = function Q(n, r, i, s) {
    try {
      var o = n.find(">ul:first-child >li:eq(" + r.act + ")");
    } catch (u) {
      var o = n.find(">ul:first-child >li:eq(1)");
    }

    r.lastslide = r.act;
    var f = n.find(">ul:first-child >li:eq(" + r.next + ")"),
        l = f.find(".slotholder"),
        c = l.data("bgposition"),
        h = l.data("bgpositionend"),
        p = l.data("zoomstart") / 100,
        d = l.data("zoomend") / 100,
        v = l.data("rotationstart"),
        m = l.data("rotationend"),
        g = l.data("bgfit"),
        y = l.data("bgfitend"),
        b = l.data("easeme"),
        w = l.data("duration") / 1e3,
        E = 100;
    if (g == t) g = 100;
    if (y == t) y = 100;
    var S = g,
        x = y;
    g = K(g, l, r);
    y = K(y, l, r);
    E = K(100, l, r);
    if (p == t) p = 1;
    if (d == t) d = 1;
    if (v == t) v = 0;
    if (m == t) m = 0;
    if (p < 1) p = 1;
    if (d < 1) d = 1;
    var T = new Object();
    T.w = parseInt(E.split(" ")[0], 0), T.h = parseInt(E.split(" ")[1], 0);
    var N = false;

    if (E.split(" ")[2] == "1") {
      N = true;
    }

    l.find(".defaultimg").each(function () {
      var t = e(this);
      if (l.find(".kenburnimg").length == 0) l.append('<div class="kenburnimg" style="position:absolute;z-index:1;width:100%;height:100%;top:0px;left:0px;"><img src="' + t.attr("src") + '" style="-webkit-touch-callout: none;-webkit-user-select: none;-khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;position:absolute;width:' + T.w + "%;height:" + T.h + '%;"></div>');else {
        l.find(".kenburnimg img").css({
          width: T.w + "%",
          height: T.h + "%"
        });
      }
      var n = l.find(".kenburnimg img");
      var i = G(r, c, g, n, N),
          o = G(r, h, y, n, N);

      if (N) {
        i.w = S / 100;
        o.w = x / 100;
      }

      if (s) {
        punchgs.TweenLite.set(n, {
          autoAlpha: 0,
          transformPerspective: 1200,
          transformOrigin: "0% 0%",
          top: 0,
          left: 0,
          scale: i.w,
          x: i.x,
          y: i.y
        });
        var u = i.w,
            f = u * n.width() - r.width,
            p = u * n.height() - r.height,
            d = Math.abs(i.x / f * 100),
            v = Math.abs(i.y / p * 100);
        if (p == 0) v = 0;
        if (f == 0) d = 0;
        t.data("bgposition", d + "% " + v + "%");
        if (!a(8)) t.data("currotate", Y(n));
        if (!a(8)) t.data("curscale", T.w * u + "%  " + (T.h * u + "%"));
        l.find(".kenburnimg").remove();
      } else t.data("kenburn", punchgs.TweenLite.fromTo(n, w, {
        autoAlpha: 1,
        force3D: punchgs.force3d,
        transformOrigin: "0% 0%",
        top: 0,
        left: 0,
        scale: i.w,
        x: i.x,
        y: i.y
      }, {
        autoAlpha: 1,
        rotationZ: m,
        ease: b,
        x: o.x,
        y: o.y,
        scale: o.w,
        onUpdate: function onUpdate() {
          var e = n[0]._gsTransform.scaleX;
          var i = e * n.width() - r.width,
              s = e * n.height() - r.height,
              o = Math.abs(n[0]._gsTransform.x / i * 100),
              u = Math.abs(n[0]._gsTransform.y / s * 100);
          if (s == 0) u = 0;
          if (i == 0) o = 0;
          t.data("bgposition", o + "% " + u + "%");
          if (!a(8)) t.data("currotate", Y(n));
          if (!a(8)) t.data("curscale", T.w * e + "%  " + (T.h * e + "%"));
        }
      }));
    });
  };

  var G = function G(e, t, n, r, i) {
    var s = new Object();
    if (!i) s.w = parseInt(n.split(" ")[0], 0) / 100;else s.w = parseInt(n.split(" ")[1], 0) / 100;

    switch (t) {
      case "left top":
      case "top left":
        s.x = 0;
        s.y = 0;
        break;

      case "center top":
      case "top center":
        s.x = ((0 - r.width()) * s.w + parseInt(e.width, 0)) / 2;
        s.y = 0;
        break;

      case "top right":
      case "right top":
        s.x = (0 - r.width()) * s.w + parseInt(e.width, 0);
        s.y = 0;
        break;

      case "center left":
      case "left center":
        s.x = 0;
        s.y = ((0 - r.height()) * s.w + parseInt(e.height, 0)) / 2;
        break;

      case "center center":
        s.x = ((0 - r.width()) * s.w + parseInt(e.width, 0)) / 2;
        s.y = ((0 - r.height()) * s.w + parseInt(e.height, 0)) / 2;
        break;

      case "center right":
      case "right center":
        s.x = (0 - r.width()) * s.w + parseInt(e.width, 0);
        s.y = ((0 - r.height()) * s.w + parseInt(e.height, 0)) / 2;
        break;

      case "bottom left":
      case "left bottom":
        s.x = 0;
        s.y = (0 - r.height()) * s.w + parseInt(e.height, 0);
        break;

      case "bottom center":
      case "center bottom":
        s.x = ((0 - r.width()) * s.w + parseInt(e.width, 0)) / 2;
        s.y = (0 - r.height()) * s.w + parseInt(e.height, 0);
        break;

      case "bottom right":
      case "right bottom":
        s.x = (0 - r.width()) * s.w + parseInt(e.width, 0);
        s.y = (0 - r.height()) * s.w + parseInt(e.height, 0);
        break;
    }

    return s;
  };

  var Y = function Y(e) {
    var t = e.css("-webkit-transform") || e.css("-moz-transform") || e.css("-ms-transform") || e.css("-o-transform") || e.css("transform");

    if (t !== "none") {
      var n = t.split("(")[1].split(")")[0].split(",");
      var r = n[0];
      var i = n[1];
      var s = Math.round(Math.atan2(i, r) * (180 / Math.PI));
    } else {
      var s = 0;
    }

    return s < 0 ? s += 360 : s;
  };

  var Z = function Z(n, r) {
    try {
      var i = n.find(">ul:first-child >li:eq(" + r.act + ")");
    } catch (s) {
      var i = n.find(">ul:first-child >li:eq(1)");
    }

    r.lastslide = r.act;
    var o = n.find(">ul:first-child >li:eq(" + r.next + ")");
    var u = i.find(".slotholder");
    var a = o.find(".slotholder");
    n.find(".defaultimg").each(function () {
      var n = e(this);
      punchgs.TweenLite.killTweensOf(n, false);
      punchgs.TweenLite.set(n, {
        scale: 1,
        rotationZ: 0
      });
      punchgs.TweenLite.killTweensOf(n.data("kenburn img"), false);

      if (n.data("kenburn") != t) {
        n.data("kenburn").pause();
      }

      if (n.data("currotate") != t && n.data("bgposition") != t && n.data("curscale") != t) punchgs.TweenLite.set(n, {
        rotation: n.data("currotate"),
        backgroundPosition: n.data("bgposition"),
        backgroundSize: n.data("curscale")
      });
      if (n != t && n.data("kenburn img") != t && n.data("kenburn img").length > 0) punchgs.TweenLite.set(n.data("kenburn img"), {
        autoAlpha: 0
      });
    });
  };

  var et = function et(t, n) {
    if (J() && n.parallaxDisableOnMobile == "on") return false;
    t.find(">ul:first-child >li").each(function () {
      var t = e(this);

      for (var r = 1; r <= 10; r++) {
        t.find(".rs-parallaxlevel-" + r).each(function () {
          var t = e(this);
          t.wrap('<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;z-index:' + t.css("zIndex") + '" class="tp-parallax-container" data-parallaxlevel="' + n.parallaxLevels[r - 1] + '"></div>');
        });
      }
    });

    if (n.parallax == "mouse" || n.parallax == "scroll+mouse" || n.parallax == "mouse+scroll") {
      t.mouseenter(function (e) {
        var n = t.find(".current-sr-slide-visible");
        var r = t.offset().top,
            i = t.offset().left,
            s = e.pageX - i,
            o = e.pageY - r;
        n.data("enterx", s);
        n.data("entery", o);
      });
      t.on("mousemove.hoverdir, mouseleave.hoverdir", function (r) {
        var i = t.find(".current-sr-slide-visible");

        switch (r.type) {
          case "mousemove":
            var s = t.offset().top,
                o = t.offset().left,
                u = i.data("enterx"),
                a = i.data("entery"),
                f = u - (r.pageX - o),
                l = a - (r.pageY - s);
            i.find(".tp-parallax-container").each(function () {
              var t = e(this),
                  r = parseInt(t.data("parallaxlevel"), 0) / 100,
                  i = f * r,
                  s = l * r;
              if (n.parallax == "scroll+mouse" || n.parallax == "mouse+scroll") punchgs.TweenLite.to(t, .4, {
                force3D: "auto",
                x: i,
                ease: punchgs.Power3.easeOut,
                overwrite: "all"
              });else punchgs.TweenLite.to(t, .4, {
                force3D: "auto",
                x: i,
                y: s,
                ease: punchgs.Power3.easeOut,
                overwrite: "all"
              });
            });
            break;

          case "mouseleave":
            i.find(".tp-parallax-container").each(function () {
              var t = e(this);
              if (n.parallax == "scroll+mouse" || n.parallax == "mouse+scroll") punchgs.TweenLite.to(t, 1.5, {
                force3D: "auto",
                x: 0,
                ease: punchgs.Power3.easeOut
              });else punchgs.TweenLite.to(t, 1.5, {
                force3D: "auto",
                x: 0,
                y: 0,
                ease: punchgs.Power3.easeOut
              });
            });
            break;
        }
      });
      if (J()) window.ondeviceorientation = function (n) {
        var r = Math.round(n.beta || 0),
            i = Math.round(n.gamma || 0);
        var s = t.find(".current-sr-slide-visible");

        if (e(window).width() > e(window).height()) {
          var o = i;
          i = r;
          r = o;
        }

        var u = 360 / t.width() * i,
            a = 180 / t.height() * r;
        s.find(".tp-parallax-container").each(function () {
          var t = e(this),
              n = parseInt(t.data("parallaxlevel"), 0) / 100,
              r = u * n,
              i = a * n;
          punchgs.TweenLite.to(t, .2, {
            force3D: "auto",
            x: r,
            y: i,
            ease: punchgs.Power3.easeOut
          });
        });
      };
    }

    if (n.parallax == "scroll" || n.parallax == "scroll+mouse" || n.parallax == "mouse+scroll") {
      e(window).on("scroll", function (e) {
        tt(t, n);
      });
    }
  };

  var tt = function tt(t, n) {
    if (J() && n.parallaxDisableOnMobile == "on") return false;
    var r = t.offset().top,
        i = e(window).scrollTop(),
        s = r + t.height() / 2,
        o = r + t.height() / 2 - i,
        u = e(window).height() / 2,
        a = u - o;
    if (s < u) a = a - (u - s);
    var f = t.find(".current-sr-slide-visible");
    t.find(".tp-parallax-container").each(function (t) {
      var n = e(this),
          r = parseInt(n.data("parallaxlevel"), 0) / 100,
          i = a * r;
      n.data("parallaxoffset", i);
      punchgs.TweenLite.to(n, .2, {
        force3D: "auto",
        y: i,
        ease: punchgs.Power3.easeOut
      });
    });

    if (n.parallaxBgFreeze != "on") {
      var l = n.parallaxLevels[0] / 100,
          c = a * l;
      punchgs.TweenLite.to(t, .2, {
        force3D: "auto",
        y: c,
        ease: punchgs.Power3.easeOut
      });
    }
  };

  var nt = function nt(n, r) {
    var i = n.parent();

    if (r.navigationType == "thumb" || r.navsecond == "both") {
      i.append('<div class="tp-bullets tp-thumbs ' + r.navigationStyle + '"><div class="tp-mask"><div class="tp-thumbcontainer"></div></div></div>');
    }

    var s = i.find(".tp-bullets.tp-thumbs .tp-mask .tp-thumbcontainer");
    var o = s.parent();
    o.width(r.thumbWidth * r.thumbAmount);
    o.height(r.thumbHeight);
    o.parent().width(r.thumbWidth * r.thumbAmount);
    o.parent().height(r.thumbHeight);
    n.find(">ul:first >li").each(function (e) {
      var i = n.find(">ul:first >li:eq(" + e + ")");
      var o = i.find(".defaultimg").css("backgroundColor");
      if (i.data("thumb") != t) var u = i.data("thumb");else var u = i.find("img:first").attr("src");
      s.append('<div class="bullet thumb" style="background-color:' + o + ";position:relative;width:" + r.thumbWidth + "px;height:" + r.thumbHeight + "px;background-image:url(" + u + ') !important;background-size:cover;background-position:center center;"></div>');
      var a = s.find(".bullet:first");
    });
    var u = 10;
    s.find(".bullet").each(function (t) {
      var i = e(this);
      if (t == r.slideamount - 1) i.addClass("last");
      if (t == 0) i.addClass("first");
      i.width(r.thumbWidth);
      i.height(r.thumbHeight);
      if (u < i.outerWidth(true)) u = i.outerWidth(true);
      i.click(function () {
        if (r.transition == 0 && i.index() != r.act) {
          r.next = i.index();
          f(r, n);
        }
      });
    });
    var a = u * n.find(">ul:first >li").length;
    var l = s.parent().width();
    r.thumbWidth = u;

    if (l < a) {
      e(document).mousemove(function (t) {
        e("body").data("mousex", t.pageX);
      });
      s.parent().mouseenter(function () {
        var t = e(this);
        var r = t.offset(),
            i = e("body").data("mousex") - r.left,
            s = t.width(),
            o = t.find(".bullet:first").outerWidth(true),
            u = o * n.find(">ul:first >li").length,
            a = u - s + 15,
            f = a / s;
        t.addClass("over");
        i = i - 30;
        var l = 0 - i * f;
        if (l > 0) l = 0;
        if (l < 0 - u + s) l = 0 - u + s;
        it(t, l, 200);
      });
      s.parent().mousemove(function () {
        var t = e(this),
            r = t.offset(),
            i = e("body").data("mousex") - r.left,
            s = t.width(),
            o = t.find(".bullet:first").outerWidth(true),
            u = o * n.find(">ul:first >li").length - 1,
            a = u - s + 15,
            f = a / s;
        i = i - 3;
        if (i < 6) i = 0;
        if (i + 3 > s - 6) i = s;
        var l = 0 - i * f;
        if (l > 0) l = 0;
        if (l < 0 - u + s) l = 0 - u + s;
        it(t, l, 0);
      });
      s.parent().mouseleave(function () {
        var t = e(this);
        t.removeClass("over");
        rt(n);
      });
    }
  };

  var rt = function rt(e) {
    var t = e.parent().find(".tp-bullets.tp-thumbs .tp-mask .tp-thumbcontainer"),
        n = t.parent(),
        r = n.offset(),
        i = n.find(".bullet:first").outerWidth(true),
        s = n.find(".bullet.selected").index() * i,
        o = n.width(),
        i = n.find(".bullet:first").outerWidth(true),
        u = i * e.find(">ul:first >li").length,
        a = u - o,
        f = a / o,
        l = 0 - s;
    if (l > 0) l = 0;
    if (l < 0 - u + o) l = 0 - u + o;

    if (!n.hasClass("over")) {
      it(n, l, 200);
    }
  };

  var it = function it(e, t, n) {
    punchgs.TweenLite.to(e.find(".tp-thumbcontainer"), .2, {
      force3D: "auto",
      left: t,
      ease: punchgs.Power3.easeOut,
      overwrite: "auto"
    });
  };
})(jQuery);

jQuery(document).ready(function () {
  var revapi; // Make Content Visible

  jQuery(".fullwidthbanner ul , .fullscreenbanner ul").removeClass('hide');
  /**
  	@HALFSCREEN SLIDER
  **/

  if (jQuery(".fullwidthbanner").length > 0) {
    // Default Thumbs [small]
    var thumbWidth = 100,
        thumbHeight = 50,
        hideThumbs = 200,
        navigationType = "bullet",
        navigationArrows = "solo",
        navigationVOffset = 10; // Shadow

    _shadow = jQuery(".fullwidthbanner").attr('data-shadow') || 0; // Small Thumbnails

    if (jQuery(".fullwidthbanner").hasClass('thumb-small')) {
      var navigationType = "thumb";
    } // Large Thumbnails


    if (jQuery(".fullwidthbanner").hasClass('thumb-large')) {
      var navigationType = "thumb";
      thumbWidth = 195, thumbHeight = 95, hideThumbs = 0, navigationArrows = "solo", navigationVOffset = -94; // Hide thumbs on mobile - Avoid gaps

      /**
      if(jQuery(window).width() < 800) {
      	setTimeout(function() {
      		var navigationVOffset = 10;
      		jQuery("div.tp-thumbs").addClass('hidden');
      	}, 100);
      }
      **/
    } // Init Revolution Slider


    revapi = jQuery('.fullwidthbanner').revolution({
      dottedOverlay: "none",
      delay: 9000,
      startwidth: 1170,
      startheight: jQuery(".fullwidthbanner").attr('data-height') || 500,
      hideThumbs: hideThumbs,
      thumbWidth: thumbWidth,
      thumbHeight: thumbHeight,
      thumbAmount: parseInt(jQuery(".fullwidthbanner ul li").length) || 2,
      navigationType: navigationType,
      navigationArrows: navigationArrows,
      navigationStyle: jQuery('.fullwidthbanner').attr('data-navigationStyle') || "round",
      // round,square,navbar,round-old,square-old,navbar-old (see docu - choose between 50+ different item)
      touchenabled: "on",
      onHoverStop: "on",
      navigationHAlign: "center",
      navigationVAlign: "bottom",
      navigationHOffset: 0,
      navigationVOffset: navigationVOffset,
      soloArrowLeftHalign: "left",
      soloArrowLeftValign: "center",
      soloArrowLeftHOffset: 20,
      soloArrowLeftVOffset: 0,
      soloArrowRightHalign: "right",
      soloArrowRightValign: "center",
      soloArrowRightHOffset: 20,
      soloArrowRightVOffset: 0,
      parallax: "mouse",
      parallaxBgFreeze: "on",
      parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
      shadow: parseInt(_shadow),
      fullWidth: "on",
      fullScreen: "off",
      stopLoop: "off",
      stopAfterLoops: -1,
      stopAtSlide: -1,
      spinner: "spinner0",
      shuffle: "off",
      autoHeight: "off",
      forceFullWidth: "off",
      hideThumbsOnMobile: "off",
      hideBulletsOnMobile: "on",
      hideArrowsOnMobile: "on",
      hideThumbsUnderResolution: 0,
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 768,
      hideAllCaptionAtLilmit: 0,
      startWithSlide: 0,
      fullScreenOffsetContainer: ""
    }); // Used by styleswitcher onle - delete this on production!

    jQuery("#is_wide, #is_boxed").bind("click", function () {
      revapi.revredraw();
    });
  }
  /**
  	@FULLSCREEN SLIDER
  **/


  if (jQuery(".fullscreenbanner").length > 0) {
    var tpj = jQuery;
    tpj.noConflict();
    var revapi25; // Shadow

    _shadow = jQuery(".fullscreenbanner").attr('data-shadow') || 0;
    tpj(document).ready(function () {
      if (tpj('.fullscreenbanner').revolution != undefined) {
        revapi25 = tpj('.fullscreenbanner').show().revolution({
          dottedOverlay: "none",
          delay: 9000,
          startwidth: 1200,
          startheight: 700,
          hideThumbs: 10,
          thumbWidth: 100,
          thumbHeight: 50,
          thumbAmount: 4,
          navigationType: "none",
          navigationArrows: "solo",
          navigationStyle: jQuery('.fullscreenbanner').attr('data-navigationStyle') || "round",
          touchenabled: "on",
          onHoverStop: "on",
          swipe_velocity: 0.7,
          swipe_min_touches: 1,
          swipe_max_touches: 1,
          drag_block_vertical: false,
          keyboardNavigation: "on",
          navigationHAlign: "center",
          navigationVAlign: "bottom",
          navigationHOffset: 0,
          navigationVOffset: 30,
          soloArrowLeftHalign: "left",
          soloArrowLeftValign: "center",
          soloArrowLeftHOffset: 20,
          soloArrowLeftVOffset: 0,
          soloArrowRightHalign: "right",
          soloArrowRightValign: "center",
          soloArrowRightHOffset: 20,
          soloArrowRightVOffset: 0,
          parallax: "mouse",
          parallaxBgFreeze: "on",
          parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
          shadow: parseInt(_shadow),
          fullWidth: "off",
          fullScreen: "on",
          stopLoop: "off",
          stopAfterLoops: -1,
          stopAtSlide: -1,
          shuffle: "off",
          forceFullWidth: "off",
          fullScreenAlignForce: "off",
          hideThumbsOnMobile: "off",
          hideBulletsOnMobile: "on",
          hideArrowsOnMobile: "off",
          hideThumbsUnderResolution: 0,
          hideSliderAtLimit: 0,
          hideCaptionAtLimit: 768,
          hideAllCaptionAtLilmit: 0,
          startWithSlide: 0,
          fullScreenOffsetContainer: jQuery("#header").hasClass('transparent') || jQuery("#header").hasClass('translucent') ? null : "#header"
        });
      }
    }); //ready
  }
  /**
  	@KEN BURNS
  **/


  if (jQuery(".fullscreenbanner.ken-burns").length > 0) {
    revapi = jQuery('.fullwidthbanner').revolution({
      dottedOverlay: "none",
      delay: 9000,
      startwidth: 1170,
      startheight: 400,
      hideThumbs: 200,
      thumbWidth: 100,
      thumbHeight: 50,
      thumbAmount: 5,
      navigationType: "bullet",
      navigationArrows: "solo",
      navigationStyle: jQuery('.fullwidthbanner').attr('data-navigationStyle') || "round",
      touchenabled: "on",
      onHoverStop: "off",
      navigationHAlign: "center",
      navigationVAlign: "bottom",
      navigationHOffset: 0,
      navigationVOffset: 10,
      soloArrowLeftHalign: "left",
      soloArrowLeftValign: "center",
      soloArrowLeftHOffset: 20,
      soloArrowLeftVOffset: 0,
      soloArrowRightHalign: "right",
      soloArrowRightValign: "center",
      soloArrowRightHOffset: 20,
      soloArrowRightVOffset: 0,
      shadow: 0,
      fullWidth: "on",
      fullScreen: "off",
      stopLoop: "off",
      stopAfterLoops: -1,
      stopAtSlide: -1,
      shuffle: "off",
      autoHeight: "off",
      forceFullWidth: "off",
      hideThumbsOnMobile: "off",
      hideBulletsOnMobile: "off",
      hideArrowsOnMobile: "off",
      hideThumbsUnderResolution: 0,
      hideSliderAtLimit: 0,
      hideCaptionAtLimit: 0,
      hideAllCaptionAtLilmit: 0,
      startWithSlide: 0,
      fullScreenOffsetContainer: ""
    }); // Used by styleswitcher only - delete this on production!

    jQuery("#is_wide, #is_boxed").bind("click", function () {
      revapi.revredraw();
    });
  }
}); //ready

/** ********************************************** **
	@Author			Dorin Grigoras
	@Website		www.stepofweb.com
*************************************************** **/

function Init(e) {
  1 != e && (_afterResize(), _slider_full(), _topNav(), _megaNavHorizontal(), _sideNav(), _stickyFooter(), _infiniteScroll()), _owl_carousel(), _flexslider(), _lightbox(), _mixitup(), _animate(), _onepageNav(), _scrollTo(!1, 0), _parallax(), _video(), _youtubeBG(), _toggle(), _placeholder(), _wrotate(),
  /*_lazyload(),*/
  _misc(), _countDown(), _masonryGallery(), _toastr(!1, !1, !1, !1), _charts(), _select2(), _form(), _pickers(), _editors(), _pajinate(), _zoom(), _autosuggest(), _stepper(), _slimScroll(), _modalAutoLoad(), _bgimage(), _stickyKit(), _cookie_alert(), _widget_flickr(), _widget_twitter(), _widget_facebook(), _widget_dribbble(), _widget_media(), jQuery("[data-toggle=tooltip]").tooltip(), jQuery("[data-toggle=popover]").popover();
}

function _afterResize() {
  jQuery(window).on("load", function () {
    "use strict";

    jQuery(window).resize(function () {
      window.afterResizeApp && clearTimeout(window.afterResizeApp), window.afterResizeApp = setTimeout(function () {
        _slider_full(), window.width = jQuery(window).width(), window.height = jQuery(window).height(), jQuery(".flexslider").length > 0 && jQuery(".flexslider").resize();
      }, 300);
    });
  });
}

window.width = jQuery(window).width(), window.height = jQuery(window).height(), jQuery(window).ready(function () {
  jQuery.fn.extend({
    size: function size() {
      return this.length;
    }
  }), _loadPopperBS4(), loadScript(plugin_path + "bootstrap/js/bootstrap.min.js", function () {
    jQuery("body").hasClass("enable-materialdesign") && loadScript(plugin_path + "mdl/material.min.js"), Init(!1);
  }), jQuery("body").hasClass("smoothscroll") && navigator.platform.indexOf("Mac") < 0 && loadScript(plugin_path + "smoothscroll.js", function () {
    jQuery.smoothScroll();
  });
}), jQuery("#preloader").length > 0 && jQuery(window).on("load", function () {
  jQuery("#preloader").fadeOut(1e3, function () {
    jQuery("#preloader").remove();
  });
});
var _arr = {};

function loadScript(e, t) {
  if (_arr[e]) t && t();else {
    _arr[e] = !0;
    var n = document.getElementsByTagName("body")[0],
        r = document.createElement("script");
    r.type = "text/javascript", r.src = e, r.onload = t, n.appendChild(r);
  }
}

function _slider_full() {
  _headerHeight = 0, jQuery("#header").hasClass("transparent") || jQuery("#header").hasClass("translucent") ? _headerHeight = 0 : (_headerHeight = jQuery("#header").outerHeight() || 0, jQuery("#topBar").length > 0 && (_topBarHeight = jQuery("#topBar").outerHeight() || 0, _headerHeight += _topBarHeight)), _screenHeight = jQuery(window).height() - _headerHeight, jQuery("#header").hasClass("static") && (_screenHeight = jQuery(window).height()), jQuery("#slider").hasClass("halfheight") && jQuery("#slider.halfheight").height(_screenHeight / 2), jQuery("#slider").hasClass("thirdheight") && jQuery("#slider.thirdheight").height(_screenHeight / 1.5), jQuery("#slider").hasClass("fullheight") && (jQuery("#slider.fullheight").height(_screenHeight), jQuery("#slider.fullheight-min").css({
    "min-height": _screenHeight + "px"
  })), window.width < 960 && jQuery("#slider.mobile-fullheight").height(_screenHeight);
}

function _topNav() {
  window.scrollTop = 0, window._cmScroll = 0;
  var e = jQuery("#header");
  jQuery(window).scroll(function () {
    jQuery(document).scrollTop() > 100 ? jQuery("#toTop").is(":hidden") && jQuery("#toTop").show() : jQuery("#toTop").is(":visible") && jQuery("#toTop").hide();
  });
  var t = !1;
  if (jQuery("#topMain a.dropdown-toggle").bind("click", function (e) {
    "#" == jQuery(this).attr("href") && e.preventDefault(), t = jQuery(this).parent().hasClass("resp-active"), jQuery("#topMain").find(".resp-active").removeClass("resp-active"), t || jQuery(this).parents("li").addClass("resp-active");
  }), jQuery("li.search i.fa").click(function () {
    jQuery("#header .search-box").is(":visible") ? jQuery("#header .search-box").fadeOut(300) : (jQuery(".search-box").fadeIn(300), jQuery("#header .search-box form input").focus(), jQuery("#header li.quick-cart div.quick-cart-box").is(":visible") && jQuery("#header li.quick-cart div.quick-cart-box").fadeOut(300));
  }), 0 != jQuery("#header li.search i.fa").size() && (jQuery("#header .search-box, #header li.search i.fa").on("click", function (e) {
    e.stopPropagation();
  }), jQuery("body").on("click", function () {
    jQuery("#header li.search .search-box").is(":visible") && jQuery("#header .search-box").fadeOut(300);
  })), jQuery(document).bind("click", function () {
    jQuery("#header li.search .search-box").is(":visible") && jQuery("#header .search-box").fadeOut(300);
  }), jQuery("#closeSearch").bind("click", function (e) {
    e.preventDefault(), jQuery("#header .search-box").fadeOut(300);
  }), jQuery("button#page-menu-mobile").bind("click", function () {
    jQuery(this).next("ul").slideToggle(150);
  }), jQuery(document).on("click", "li.quick-cart>a", function (e) {
    e.preventDefault();
    var t = jQuery("li.quick-cart div.quick-cart-box");
    t.is(":visible") ? t.fadeOut(300) : (t.fadeIn(300), jQuery("li.search .search-box").is(":visible") && jQuery(".search-box").fadeOut(300));
  }), 0 != jQuery("li.quick-cart>a").size() && (jQuery(document).on("click", "li.quick-cart", function (e) {
    e.stopPropagation();
  }), jQuery("body").on("click", function () {
    jQuery("li.quick-cart div.quick-cart-box").is(":visible") && jQuery("li.quick-cart div.quick-cart-box").fadeOut(300);
  })), jQuery("#page-menu ul.menu-scrollTo>li").bind("click", function (e) {
    var t = jQuery("a", this).attr("href");
    jQuery("a", this).hasClass("external") || (e.preventDefault(), jQuery("#page-menu ul.menu-scrollTo>li").removeClass("active"), jQuery(this).addClass("active"), jQuery(t).length > 0 && (_padding_top = 0, jQuery("#header").hasClass("sticky") && (_padding_top = jQuery(t).css("padding-top"), _padding_top = _padding_top.replace("px", "")), jQuery("html,body").animate({
      scrollTop: jQuery(t).offset().top - _padding_top
    }, 800, "easeInOutExpo")));
  }), window.currentScroll = 0, jQuery("button.btn-mobile").bind("click", function (e) {
    e.preventDefault(), jQuery(this).toggleClass("btn-mobile-active"), jQuery("html").removeClass("noscroll"), jQuery("#menu-overlay").remove(), jQuery("#topNav div.nav-main-collapse").hide(0), jQuery(this).hasClass("btn-mobile-active") ? (jQuery("#topNav div.nav-main-collapse").show(0), jQuery("body").append('<div id="menu-overlay"></div>'), (!jQuery("#topMain").hasClass("nav-onepage") || window.width > 960) && (jQuery("html").addClass("noscroll"), window.currentScroll = jQuery(window).scrollTop())) : (!jQuery("#topMain").hasClass("nav-onepage") || window.width > 960) && jQuery("html,body").animate({
      scrollTop: currentScroll
    }, 300, "easeInOutExpo");
  }), e.hasClass("bottom")) e.addClass("dropup"), window.homeHeight = jQuery(window).outerHeight() - 55, e.hasClass("sticky") && (window.isOnTop = !0, jQuery(window).scroll(function () {
    jQuery(document).scrollTop() > window.homeHeight / 2 ? e.removeClass("dropup") : e.addClass("dropup");
  }), jQuery(window).scroll(function () {
    jQuery(document).scrollTop() > window.homeHeight ? !0 === window.isOnTop && (jQuery("#header").addClass("fixed"), e.removeClass("dropup"), window.isOnTop = !1) : !1 === window.isOnTop && (jQuery("#header").removeClass("fixed"), e.addClass("dropup"), window.isOnTop = !0);
  }), jQuery(window).resize(function () {
    window.homeHeight = jQuery(window).outerHeight();
  }));else if (e.hasClass("sticky")) {
    if (_topBar_H = jQuery("#topBar").outerHeight() || 0, window.width <= 992 && _topBar_H < 1) {
      jQuery(document).scrollTop();
      l = e.outerHeight() || 0, e.addClass("fixed"), jQuery("body").css({
        "padding-top": l + "px"
      });
    }

    if (e.hasClass("transparent")) var n = jQuery("#topNav div.nav-main-collapse"),
        r = n.attr("data-switch-default") || "",
        i = n.attr("data-switch-scroll") || "";
    jQuery(window).scroll(function () {
      if (window.width > 992 && _topBar_H < 1 || _topBar_H > 0) {
        var t = jQuery(document).scrollTop();
        t > _topBar_H ? (e.addClass("fixed"), l = e.outerHeight() || 0, e.hasClass("transparent") || e.hasClass("translucent") || jQuery("body").css({
          "padding-top": l + "px"
        })) : (e.hasClass("transparent") || e.hasClass("translucent") || jQuery("body").css({
          "padding-top": "0px"
        }), e.removeClass("fixed"));
      }

      e.hasClass("transparent") && ("" == r && "" == i || (t > 0 ? window._cmScroll < 1 && (n.removeClass(r, i).addClass(i), window._cmScroll = 1) : t < 1 && (n.removeClass(r, i).addClass(r), window._cmScroll = 0)));
    });
  } else if (e.hasClass("scroll")) {
    var a;
    jQuery("body").addClass("header-scroll-reveal");
    var o = 0,
        s = 5,
        l = e.outerHeight() || 0;
    jQuery(window).scroll(function (e) {
      a = !0;
    }), setInterval(function () {
      a && (!function () {
        var t = $(this).scrollTop();
        if (Math.abs(o - t) <= s) return;
        t > o && t > l ? e.removeClass("nav-down").addClass("nav-up") : t + jQuery(window).height() < jQuery(document).height() && e.removeClass("nav-up").addClass("nav-down");
        o = t;
      }(), a = !1);
    }, 100);
  } else if (e.hasClass("static") && e.hasClass("transparent")) {
    if (_topBar_H = jQuery("#topBar").outerHeight() || 0, window.width <= 992 && _topBar_H < 1) {
      jQuery(document).scrollTop();
      l = e.outerHeight() || 0, e.addClass("fixed");
    }

    jQuery(window).scroll(function () {
      (window.width > 992 && _topBar_H < 1 || _topBar_H > 0) && (jQuery(document).scrollTop() > _topBar_H ? (e.addClass("fixed"), l = e.outerHeight() || 0) : e.removeClass("fixed"));
    });
  } else e.hasClass("static");

  if (jQuery("#slidetop a.slidetop-toggle").bind("click", function () {
    jQuery("#slidetop .container").slideToggle(150, function () {
      jQuery("#slidetop .container").is(":hidden") ? jQuery("#slidetop").removeClass("active") : jQuery("#slidetop").addClass("active");
    });
  }), jQuery(document).keyup(function (e) {
    27 == e.keyCode && jQuery("#slidetop").hasClass("active") && jQuery("#slidetop .container").slideToggle(150, function () {
      jQuery("#slidetop").removeClass("active");
    });
  }), jQuery("a#sidepanel_btn").bind("click", function (e) {
    e.preventDefault(), c = "right", jQuery("#sidepanel").hasClass("sidepanel-inverse") && (c = "left"), jQuery("#sidepanel").is(":hidden") ? (jQuery("body").append('<span id="sidepanel_overlay"></span>'), "left" == c ? jQuery("#sidepanel").stop().show().animate({
      left: "0px"
    }, 150) : jQuery("#sidepanel").stop().show().animate({
      right: "0px"
    }, 150)) : (jQuery("#sidepanel_overlay").remove(), "left" == c ? jQuery("#sidepanel").stop().animate({
      left: "-300px"
    }, 300) : jQuery("#sidepanel").stop().animate({
      right: "-300px"
    }, 300), setTimeout(function () {
      jQuery("#sidepanel").hide();
    }, 500)), jQuery("#sidepanel_overlay").unbind(), jQuery("#sidepanel_overlay").bind("click", function () {
      jQuery("a#sidepanel_btn").trigger("click");
    });
  }), jQuery("#sidepanel_close").bind("click", function (e) {
    e.preventDefault(), jQuery("a#sidepanel_btn").trigger("click");
  }), jQuery(document).keyup(function (e) {
    27 == e.keyCode && jQuery("#sidepanel").is(":visible") && jQuery("a#sidepanel_btn").trigger("click");
  }), jQuery("#menu_overlay_open").length > 0) {
    var u = !!jQuery("html").hasClass("ie9");
    1 == u && jQuery("#topMain").hide(), jQuery("#menu_overlay_open").bind("click", function (e) {
      e.preventDefault(), jQuery("body").addClass("show-menu"), 1 == u && jQuery("#topMain").show();
    }), jQuery("#menu_overlay_close").bind("click", function (e) {
      e.preventDefault(), jQuery("body").hasClass("show-menu") && jQuery("body").removeClass("show-menu"), 1 == u && jQuery("#topMain").hide();
    }), jQuery(document).keyup(function (e) {
      27 == e.keyCode && (jQuery("body").hasClass("show-menu") && jQuery("body").removeClass("show-menu"), 1 == u && jQuery("#topMain").hide());
    });
  }

  if (jQuery("#sidebar_vertical_btn").length > 0 && jQuery("body").hasClass("menu-vertical-hide")) {
    if (_paddingStatusL = jQuery("#mainMenu.sidebar-vertical").css("left"), _paddingStatusR = jQuery("#mainMenu.sidebar-vertical").css("right"), parseInt(_paddingStatusL) < 0) var c = "left";else if (parseInt(_paddingStatusR) < 0) c = "right";else c = "left";
    jQuery("#sidebar_vertical_btn").bind("click", function (e) {
      _paddingStatus = jQuery("#mainMenu.sidebar-vertical").css(c), parseInt(_paddingStatus) < 0 ? "right" == c ? jQuery("#mainMenu.sidebar-vertical").stop().animate({
        right: "0px"
      }, 200) : jQuery("#mainMenu.sidebar-vertical").stop().animate({
        left: "0px"
      }, 200) : "right" == c ? jQuery("#mainMenu.sidebar-vertical").stop().animate({
        right: "-263px"
      }, 200) : jQuery("#mainMenu.sidebar-vertical").stop().animate({
        left: "-263px"
      }, 200);
    }), jQuery(window).scroll(function () {
      _paddingStatus = parseInt(jQuery("#mainMenu.sidebar-vertical").css(c)), _paddingStatus >= 0 && ("right" == c ? jQuery("#mainMenu.sidebar-vertical").stop().animate({
        right: "-263px"
      }, 200) : jQuery("#mainMenu.sidebar-vertical").stop().animate({
        left: "-263px"
      }, 200));
    });
  }

  jQuery("#topBar").length > 0 && jQuery("#topNav ul").addClass("has-topBar"), jQuery(window).scroll(function () {
    window.width < 769 && (jQuery("#header li.quick-cart div.quick-cart-box").is(":visible") && jQuery("#header li.quick-cart div.quick-cart-box").fadeOut(0), jQuery("#header li.search .search-box").is(":visible") && jQuery("#header .search-box").fadeOut(0));
  });
}

function _megaNavHorizontal() {
  if (jQuery("#wrapper nav.main-nav").length > 0) {
    var e = jQuery("#slider").width(),
        t = jQuery("#wrapper nav.main-nav").height();
    jQuery("#wrapper nav.main-nav>div>ul>li>.main-nav-submenu").css({
      "min-height": t + "px"
    }), jQuery("#wrapper nav.main-nav>div>ul>li.main-nav-expanded>.main-nav-submenu").css({
      width: e + "px"
    }), jQuery("#wrapper nav.main-nav>div>ul>li").bind("click", function (e) {
      var t = jQuery(this);
      jQuery("div", t).hasClass("main-nav-open") || jQuery("#wrapper nav.main-nav>div>ul>li>.main-nav-submenu").removeClass("main-nav-open"), jQuery("div", t).toggleClass("main-nav-open");
    });
  }

  var n = jQuery("#header>.container").width() - 278,
      r = jQuery("#header nav.main-nav").height();

  function i() {
    jQuery("#main-nav-overlay").remove(), jQuery("#header nav.main-nav").addClass("min-nav-active"), jQuery("body").append('<div id="main-nav-overlay"></div>'), jQuery("#header button.nav-toggle-close").bind("click", function () {
      jQuery("#header nav.main-nav").removeClass("min-nav-active");
    }), jQuery("#main-nav-overlay, #header").mouseover(function () {
      a();
    });
  }

  function a() {
    jQuery("#main-nav-overlay").remove(), jQuery("#header nav.main-nav").removeClass("min-nav-active");
  }

  jQuery("#header nav.main-nav>div>ul>li>.main-nav-submenu").css({
    "min-height": r + "px"
  }), jQuery("#header nav.main-nav>div>ul>li.main-nav-expanded>.main-nav-submenu").css({
    width: n + "px"
  }), jQuery("#header nav.main-nav>div>ul>li").bind("click", function (e) {
    var t = jQuery(this);
    jQuery("div", t).hasClass("main-nav-open") || jQuery("#header nav.main-nav>div>ul>li>.main-nav-submenu").removeClass("main-nav-open"), jQuery("div", t).toggleClass("main-nav-open");
  }), window.width > 767 ? jQuery("#header button.nav-toggle").mouseover(function (e) {
    e.preventDefault(), i();
  }) : jQuery("#header button.nav-toggle").bind("click", function (e) {
    e.preventDefault(), i();
  }), jQuery("body").on("click", "#header button.nav-toggle, #header nav.main-nav", function (e) {
    e.stopPropagation();
  }), jQuery("#header button.nav-toggle, #header nav.main-nav").mouseover(function (e) {
    e.stopPropagation();
  }), jQuery(document).bind("click", function () {
    a();
  }), jQuery("nav.main-nav>div>ul>li a").bind("click", function (e) {
    "#" == jQuery(this).attr("href") && e.preventDefault();
  });
}

function _sideNav() {
  jQuery("div.side-nav").each(function () {
    var e = jQuery("ul", this);
    jQuery("button", this).bind("click", function () {
      e.slideToggle(300);
    });
  }), jQuery("div.side-nav li>a.dropdown-toggle").bind("click", function (e) {
    "#" == jQuery(this).attr("href") && e.preventDefault(), jQuery(this).next("ul").slideToggle(200), jQuery(this).closest("li").toggleClass("active");
  });
}

function _animate() {
  jQuery("body").hasClass("enable-animation") && new WOW({
    boxClass: "wow",
    animateClass: "animated",
    offset: 15,
    mobile: !1,
    live: !0
  }).init();
  jQuery(".countTo").appear(function () {
    var e = jQuery(this),
        t = e.attr("data-from") || 0,
        n = e.attr("data-speed") || 1300,
        r = e.attr("data-refreshInterval") || 60;
    e.countTo({
      from: parseInt(t),
      to: e.html(),
      speed: parseInt(n),
      refreshInterval: parseInt(r)
    });
  });
}

function _onepageNav() {
  var e = jQuery(".nav-onepage");
  e.length > 0 && loadScript(plugin_path + "jquery.nav.min.js", function () {
    jQuery(e).onePageNav({
      currentClass: "active",
      changeHash: !1,
      scrollSpeed: 750,
      scrollThreshold: .5,
      filter: ":not(.external)",
      easing: "easeInOutExpo"
    }), jQuery("#topMain.nav-onepage li>a").bind("click", function () {
      window.width < 960 && jQuery("button.btn-mobile").trigger("click");
    });
  });
  var t = jQuery("#nav-bullet");
  t.length > 0 && loadScript(plugin_path + "jquery.nav.min.js", function () {
    jQuery(t).onePageNav({
      currentClass: "active",
      changeHash: !1,
      scrollSpeed: 750,
      scrollThreshold: .5,
      filter: ":not(.external)",
      easing: "easeInOutExpo"
    });
  });
}

function _owl_carousel() {
  var _container = jQuery("div.owl-carousel");

  _container.length > 0 && loadScript(plugin_path + "owl-carousel/owl.carousel.min.js", function () {
    _container.each(function () {
      var slider = jQuery(this),
          options = slider.attr("data-plugin-options"),
          $opt = eval("(" + options + ")");
      if ("true" == $opt.progressBar) var afterInit = progressBar;else var afterInit = !1;
      var defaults = {
        items: 5,
        itemsCustom: !1,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1],
        singleItem: !0,
        itemsScaleUp: !1,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1e3,
        autoPlay: !1,
        stopOnHover: !1,
        navigation: !1,
        navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        rewindNav: !0,
        scrollPerPage: !1,
        pagination: !0,
        paginationNumbers: !1,
        responsive: !0,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: window,
        baseClass: "owl-carousel",
        theme: "owl-theme",
        lazyLoad: !1,
        lazyFollow: !0,
        lazyEffect: "fade",
        autoHeight: !1,
        jsonPath: !1,
        jsonSuccess: !1,
        dragBeforeAnimFinish: !0,
        mouseDrag: !0,
        touchDrag: !0,
        transitionStyle: !1,
        addClassActive: !1,
        beforeUpdate: !1,
        afterUpdate: !1,
        beforeInit: !1,
        afterInit: afterInit,
        beforeMove: !1,
        afterMove: 0 != afterInit && moved,
        afterAction: !1,
        startDragging: !1,
        afterLazyLoad: !1
      },
          config = jQuery.extend({}, defaults, options, slider.data("plugin-options"));
      slider.owlCarousel(config).addClass("owl-carousel-init");
      var elem = jQuery(this);

      function progressBar(e) {
        $elem = e, buildProgressBar(), start();
      }

      function buildProgressBar() {
        $progressBar = jQuery("<div>", {
          id: "progressBar"
        }), $bar = jQuery("<div>", {
          id: "bar"
        }), $progressBar.append($bar).prependTo($elem);
      }

      function start() {
        percentTime = 0, isPause = !1, tick = setInterval(interval, 10);
      }

      var time = 7;

      function interval() {
        !1 === isPause && (percentTime += 1 / time, $bar.css({
          width: percentTime + "%"
        }), percentTime >= 100 && $elem.trigger("owl.next"));
      }

      function pauseOnDragging() {
        isPause = !0;
      }

      function moved() {
        clearTimeout(tick), start();
      }
    });
  });

  var _container2 = jQuery("div.owl-carousel-2");

  _container2.length > 0 && loadScript(plugin_path + "owl-carousel-2/owl.carousel.min.js", function () {
    _container2.each(function () {
      var _defaults2;

      var e = jQuery(this),
          t = e.attr("data-plugin-options");
      _defaults = (_defaults2 = {
        loop: !0,
        margin: 10,
        nav: !0,
        center: !1,
        mouseDrag: !0,
        touchDrag: !0,
        pullDrag: !0,
        freeDrag: !1,
        stagePadding: 0,
        merge: !1,
        mergeFit: !0,
        autoWidth: !1,
        startPosition: 0,
        URLhashListener: !1,
        navRewind: !0,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        slideBy: 1,
        dots: !0,
        dotsEach: !1,
        dotData: !1,
        lazyLoad: !1,
        lazyContent: !1,
        autoplay: !1,
        autoplayTimeout: 3e3,
        autoplayHoverPause: !1,
        smartSpeed: 250,
        autoplaySpeed: !1,
        navSpeed: !1,
        dragEndSpeed: !1,
        callbacks: !0,
        responsiveRefreshRate: 200,
        responsiveBaseElement: "#wrapper",
        responsiveClass: !0,
        video: !1,
        videoHeight: !1,
        videoWidth: !1,
        animateOut: !1,
        animateIn: !1,
        fallbackEasing: "swing",
        info: !1,
        nestedItemSelector: !1,
        itemElement: "div",
        navContainer: !1,
        dotsContainer: !1
      }, _defineProperty(_defaults2, "animateOut", "slideOutDown"), _defineProperty(_defaults2, "animateIn", "flipInX"), _defineProperty(_defaults2, "responsive", {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1e3: {
          items: 5
        }
      }), _defaults2);
      var n = jQuery.extend({}, _defaults, JSON.parse(t));
      e.owlCarousel(n).addClass("owl-loaded");
    });
  });
}

function _flexslider() {
  var e = jQuery(".flexslider");
  e.length > 0 && loadScript(plugin_path + "slider.flexslider/jquery.flexslider-min.js", function () {
    if (jQuery().flexslider) {
      var t = e.attr("data-controlNav"),
          n = e.attr("data-slideshowSpeed") || 7e3,
          r = e.attr("data-pauseOnHover") || !1;
      r = "true" == r, t = "thumbnails" == t ? "thumbnails" : "true" == t || "false" != t, _directionNav = "thumbnails" != t && 0 != t, jQuery(e).flexslider({
        animation: "slide",
        controlNav: t,
        slideshowSpeed: parseInt(n) || 7e3,
        directionNav: _directionNav,
        pauseOnHover: r,
        start: function start(e) {
          jQuery(".flex-prev").html('<i class="fa fa-angle-left"></i>'), jQuery(".flex-next").html('<i class="fa fa-angle-right"></i>');
        }
      }), e.resize();
    }
  });
}

function _lightbox() {
  var e = jQuery(".lightbox");
  e.length > 0 && loadScript(plugin_path + "magnific-popup/jquery.magnific-popup.min.js", function () {
    if (void 0 === jQuery.magnificPopup) return !1;
    jQuery.extend(!0, jQuery.magnificPopup.defaults, {
      tClose: "Close",
      tLoading: "Loading...",
      gallery: {
        tPrev: "Previous",
        tNext: "Next",
        tCounter: "%curr% / %total%"
      },
      image: {
        tError: "Image not loaded!"
      },
      ajax: {
        tError: "Content not loaded!"
      }
    }), e.each(function () {
      var e = jQuery(this),
          t = e.attr("data-plugin-options"),
          n = {};
      e.data("plugin-options") && (n = jQuery.extend({}, {
        type: "image",
        fixedContentPos: !1,
        fixedBgPos: !1,
        mainClass: "mfp-no-margins mfp-with-zoom",
        closeOnContentClick: !0,
        closeOnBgClick: !0,
        image: {
          verticalFit: !0
        },
        zoom: {
          enabled: !1,
          duration: 300
        },
        gallery: {
          enabled: !1,
          navigateByImgClick: !0,
          preload: [0, 1],
          arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
          tPrev: "Previous",
          tNext: "Next",
          tCounter: '<span class="mfp-counter">%curr% / %total%</span>'
        }
      }, t, e.data("plugin-options"))), jQuery(this).magnificPopup(n);
    });
  });
}

function _scrollTo(e, t) {
  0 == e ? (jQuery("a.scrollTo").bind("click", function (e) {
    e.preventDefault();
    var t = jQuery(this).attr("href"),
        n = jQuery(this).attr("data-offset") || 0;
    "#" != t && "#top" != t && jQuery("html,body").animate({
      scrollTop: jQuery(t).offset().top - parseInt(n)
    }, 800, "easeInOutExpo"), "#top" == t && jQuery("html,body").animate({
      scrollTop: 0
    }, 800, "easeInOutExpo");
  }), jQuery("#toTop").bind("click", function (e) {
    e.preventDefault(), jQuery("html,body").animate({
      scrollTop: 0
    }, 800, "easeInOutExpo");
  })) : jQuery("html,body").animate({
    scrollTop: jQuery(e).offset().top - t
  }, 800, "easeInOutExpo");
}

function _parallax() {
  jQuery().parallax && jQuery(".parallax-auto, .parallax-1, .parallax-2, .parallax-3, .parallax-4, section.page-header.page-header-parallax").each(function () {
    jQuery(this);
    jQuery(this).parallax("50%", "0.2");
  });
  var e = jQuery("#slider");

  if (e.length > 0 && e.hasClass("parallax-slider")) {
    if (window.width < 768 && e.hasClass("pallax-slider-mobile-deisable")) return !1;
    e.offset().top;
    jQuery(window).scroll(function () {
      var t = jQuery(document).scrollTop(),
          n = e.attr("data-parallax-offset") || 0;

      if (t < 768) {
        var r = jQuery("#slider").height();
        jQuery("#slider>div").css("top", .5 * t - Number(n)), e.hasClass("parallax-slider-noopacity") || jQuery("#slider>div").css("opacity", 1 - t / r * 1);
      }
    });
  }
}

function _video() {
  if (jQuery("section.section-video").length > 0) {
    var e = jQuery("section.section-video .section-container-video>video");
    _w = jQuery(window).width(), e.width(_w);
  }
}

function _youtubeBG() {
  jQuery("#YTPlayer").length > 0 && loadScript(plugin_path + "jquery.mb.YTPlayer.min.js", function () {
    if (jQuery().mb_YTPlayer) {
      /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent), jQuery(".player").mb_YTPlayer(), jQuery("#video-volume").bind("click", function (e) {
        e.preventDefault(), jQuery("#YTPlayer").toggleVolume();
      }), jQuery("#video-volume").bind("click", function () {
        jQuery("i.fa", this).hasClass("fa-volume-down") ? (jQuery("i.fa", this).removeClass("fa-volume-down"), jQuery("i.fa", this).removeClass("fa-volume-up"), jQuery("i.fa", this).addClass("fa-volume-up")) : (jQuery("i.fa", this).removeClass("fa-volume-up"), jQuery("i.fa", this).removeClass("fa-volume-v"), jQuery("i.fa", this).addClass("fa-volume-down"));
      });
    }
  });
}

function _mixitup() {
  var e = jQuery(".mix-grid");
  e.length > 0 && loadScript(plugin_path + "mixitup/jquery.mixitup.min.js", function () {
    jQuery().mixitup && (e.mixitup(), jQuery("ul.mix-filter a").bind("click", function (e) {
      e.preventDefault();
    }));
  });
}

function _toggle() {
  jQuery("div.toggle.active > p").addClass("preview-active"), jQuery("div.toggle.active > div.toggle-content").slideDown(400), jQuery("div.toggle > label").click(function (e) {
    var t = jQuery(this).parent(),
        n = jQuery(this).parents("div.toggle"),
        r = !1;

    if (n.hasClass("toggle-accordion") && void 0 !== e.originalEvent && n.find("div.toggle.active > label").trigger("click"), t.toggleClass("active"), t.find("> p").get(0)) {
      var i = (r = t.find("> p")).css("height"),
          a = r.css("height");
      r.css("height", "auto"), r.css("height", i);
    }

    var o = t.find("> div.toggle-content");
    t.hasClass("active") ? (jQuery(r).animate({
      height: a
    }, 350, function () {
      jQuery(this).addClass("preview-active");
    }), o.slideDown(350)) : (jQuery(r).animate({
      height: 25
    }, 350, function () {
      jQuery(this).removeClass("preview-active");
    }), o.slideUp(350));
  });
}

function _placeholder() {
  -1 != navigator.appVersion.indexOf("MSIE") && jQuery("[placeholder]").focus(function () {
    var e = jQuery(this);
    e.val() == e.attr("placeholder") && (e.val(""), e.removeClass("placeholder"));
  }).blur(function () {
    var e = jQuery(this);
    "" != e.val() && e.val() != e.attr("placeholder") || (e.addClass("placeholder"), e.val(e.attr("placeholder")));
  }).blur();
}

function _wrotate() {
  jQuery(".word-rotator").each(function () {
    var e = jQuery(this),
        t = e.find(".items"),
        n = t.find("> span"),
        r = n.eq(0).clone(),
        i = jQuery(this).height(),
        a = 1,
        o = 0,
        s = jQuery(this).attr("data-delay") || 2e3;
    t.append(r), e.height(i).addClass("active"), setInterval(function () {
      o = a * i, t.animate({
        top: -o + "px"
      }, 300, "easeOutQuad", function () {
        ++a > n.length && (t.css("top", 0), a = 1);
      });
    }, s);
  });
  var e = jQuery("span.rotate");
  e.length > 0 && loadScript(plugin_path + "text-rotator/jquery.simple-text-rotator.min.js", function () {
    e.each(function () {
      var e = jQuery(this),
          t = e.attr("data-animation") || "fade",
          n = e.attr("data-speed") || 2e3;
      e.textrotator({
        animation: t,
        speed: parseInt(n)
      });
    });
  });
} // function _lazyload() {
//     var e = jQuery("img.lazy");
//     e.length > 0 && loadScript(plugin_path + "lazyload/jquery.lazyload.min.js", function() {
//         jQuery().lazyload && e.each(function() {
//             var e = jQuery(this),
//                 t = e.attr("data-effect") || "fadeIn";
//             e.lazyload({
//                 effect: t
//             })
//         })
//     })
// }


function _misc() {
  if (jQuery("#portfolio").length > 0 && jQuery("#portfolio .item-box .owl-carousel").each(function () {
    jQuery(this).parent().parent().find(".item-box-desc").css({
      "padding-top": "29px"
    });
  }), jQuery().masonry && jQuery(".masonry").masonry(), jQuery("#portfolio.portfolio-isotope").length > 0 && loadScript(plugin_path + "isotope/isotope.pkgd.min.js", function () {
    if (jQuery().isotope) {
      var t = function t() {
        _dw = jQuery(document).width(), e.hasClass("fullwidth") ? (_w = e.width(), _wItem = _w / _cols, _dw < 760 && (_wItem = _w / 2), _dw < 480 && (_wItem = jQuery("#portfolio").width()), jQuery("#portfolio>.portfolio-item").css({
          width: _wItem
        })) : (_mR = parseInt(jQuery("#portfolio>.portfolio-item").css("margin-right")), _w = jQuery("#portfolio").closest(".container").width(), _wItem = _w / _cols - _mR, _dw < 760 && (_wItem = _w / 2 - _mR), _dw < 480 && (_wItem = _w), jQuery("#portfolio.portfolio-isotope").css({
          width: _w
        }), jQuery("#portfolio>.portfolio-item").css({
          width: _wItem
        })), jQuery(".flexslider").length > 0 && jQuery(".flexslider").resize();
      };

      var e = jQuery("#portfolio");
      e.hasClass("portfolio-isotope-2") ? _cols = 2 : e.hasClass("portfolio-isotope-3") ? _cols = 3 : e.hasClass("portfolio-isotope-4") ? _cols = 4 : e.hasClass("portfolio-isotope-5") ? _cols = 5 : e.hasClass("portfolio-isotope-6") ? _cols = 6 : _cols = 4, t(), jQuery(window).on("load", function () {
        setTimeout(function () {
          e.isotope({
            masonry: {},
            filter: "*",
            animationOptions: {
              duration: 750,
              easing: "linear",
              queue: !1
            }
          }), jQuery("#portfolio_filter>li>a").bind("click", function (t) {
            t.preventDefault(), jQuery("#portfolio_filter>li.active").removeClass("active"), jQuery(this).parent("li").addClass("active");
            var n = jQuery(this).attr("data-filter");
            e.isotope({
              filter: n,
              animationOptions: {
                duration: 750,
                easing: "linear",
                queue: !1
              }
            });
          });
        }, 50);
        setTimeout(function () {
          e.isotope("layout");
        }, 300);
      }), jQuery(window).resize(function () {
        window.afterResizeApp2 && clearTimeout(window.afterResizeApp2), window.afterResizeApp2 = setTimeout(function () {
          t(), setTimeout(function () {
            e.isotope("layout");
          }, 300);
        }, 300);
      });
    }
  }), jQuery("#blog.blog-isotope").length > 0 && loadScript(plugin_path + "isotope/isotope.pkgd.min.js", function () {
    if (jQuery().isotope) {
      var t = function t() {
        _dw = jQuery(document).width(), e.hasClass("fullwidth") ? (_w = jQuery(document).width(), _wItem = _w / _cols, _dw < 760 && (_wItem = _w / 2), _dw < 480 && (_wItem = jQuery("#blog").width()), jQuery("#blog>.blog-post-item").css({
          width: _wItem
        })) : (_mR = parseInt(jQuery("#blog>.blog-post-item").css("margin-right")), _w = jQuery("#blog").closest(".container").width(), _wItem = _w / _cols - _mR, _dw < 760 && (_wItem = _w / 2 - _mR), _dw < 480 && (_wItem = _w), jQuery("#blog.blog-isotope").css({
          width: _w
        }), jQuery("#blog>.blog-post-item").css({
          width: _wItem
        })), jQuery(".flexslider").length > 0 && jQuery(".flexslider").resize();
      };

      var e = jQuery("#blog");
      e.hasClass("blog-isotope-2") ? _cols = 2 : e.hasClass("blog-isotope-3") ? _cols = 3 : (e.hasClass("blog-isotope-4"), _cols = 4), t(), jQuery(window).on("load", function () {
        setTimeout(function () {
          e.isotope({
            masonry: {},
            filter: "*",
            animationOptions: {
              duration: 750,
              easing: "linear",
              queue: !1
            }
          }), jQuery("#blog_filter>li>a").bind("click", function (t) {
            t.preventDefault(), jQuery("#blog_filter>li.active").removeClass("active"), jQuery(this).parent("li").addClass("active");
            var n = jQuery(this).attr("data-filter");
            e.isotope({
              filter: n,
              animationOptions: {
                duration: 750,
                easing: "linear",
                queue: !1
              }
            });
          });
        }, 50);
        setTimeout(function () {
          e.isotope("layout");
        }, 300);
      }), jQuery(window).resize(function () {
        window.afterResizeApp2 && clearTimeout(window.afterResizeApp2), window.afterResizeApp2 = setTimeout(function () {
          t(), setTimeout(function () {
            e.isotope("layout");
          }, 300);
        }, 300);
      });
    }
  }), jQuery(".box-flip").length > 0 && (jQuery(".box-flip").each(function () {
    _height1 = jQuery(".box1", this).outerHeight(), _height2 = jQuery(".box2", this).outerHeight(), _height1 >= _height2 ? _height = _height1 : _height = _height2, jQuery(this).css({
      "min-height": _height + "px"
    }), jQuery(".box1", this).css({
      "min-height": _height + "px"
    }), jQuery(".box2", this).css({
      "min-height": _height + "px"
    });
  }), jQuery(".box-flip").hover(function () {
    jQuery(this).addClass("flip");
  }, function () {
    jQuery(this).removeClass("flip");
  })), jQuery("div.sticky-side").length > 0) {
    var e = jQuery("div.sticky-side");
    _h = e.height() / 2, e.css({
      "margin-top": "-" + _h + "px"
    });
  }

  jQuery(".incr").bind("click", function (e) {
    e.preventDefault();
    var t = jQuery(this).attr("data-for"),
        n = parseInt(jQuery(this).attr("data-max")),
        r = parseInt(jQuery("#" + t).val());
    r < n && jQuery("#" + t).val(r + 1);
  }), jQuery(".decr").bind("click", function (e) {
    e.preventDefault();
    var t = jQuery(this).attr("data-for"),
        n = parseInt(jQuery(this).attr("data-min")),
        r = parseInt(jQuery("#" + t).val());
    r > n && jQuery("#" + t).val(r - 1);
  }), jQuery("a.toggle-default").bind("click", function (e) {
    e.preventDefault();
    var t = jQuery(this).attr("href");
    jQuery(t).is(":hidden") ? (jQuery(t).slideToggle(200), jQuery("i.fa", this).removeClass("fa-plus-square").addClass("fa-minus-square")) : (jQuery(t).slideToggle(200), jQuery("i.fa", this).removeClass("fa-minus-square").addClass("fa-plus-square"));
  }), jQuery("input[type=file]").length > 0 && loadScript(plugin_path + "custom.fle_upload.js"), jQuery("textarea.word-count").on("keyup", function () {
    var e = jQuery(this),
        t = this.value.match(/\S+/g).length,
        n = e.attr("data-maxlength") || 200;

    if (t > parseInt(n)) {
      var r = e.val().split(/\s+/, 200).join(" ");
      e.val(r + " ");
    } else {
      var i = e.attr("data-info");

      if ("" == i || void 0 == i) {
        var a = e.next("div");
        jQuery("span", a).text(t + "/" + n);
      } else jQuery("#" + i).text(t + "/" + n);
    }
  });
}

function _stickyFooter() {
  if (jQuery("#footer").hasClass("sticky")) {
    var r = function r() {
      e = n.height(), t = jQuery(window).scrollTop() + jQuery(window).height() - e + "px", jQuery(document.body).height() + e > jQuery(window).height() ? n.css({
        position: "absolute"
      }).stop().animate({
        top: t
      }, 0) : n.css({
        position: "static"
      });
    };

    var e = 0,
        t = 0,
        n = jQuery("#footer.sticky");
    r(), jQuery(window).scroll(r).resize(r);
  }
}

function _countDown() {
  var e = jQuery(".countdown"),
      t = jQuery(".countdown-download");
  (e.length > 0 || t.length > 0) && loadScript(plugin_path + "countdown/jquery.countdown.pack.min.js", function () {
    e.each(function () {
      var e = jQuery(this),
          t = e.attr("data-from"),
          n = e.attr("data-labels");

      if (n && (n = n.split(",")), t) {
        var r = new Date(t);
        jQuery(this).countdown({
          until: new Date(r),
          labels: n || ["Years", "Months", "Weeks", "Days", "Hours", "Minutes", "Seconds"]
        });
      }
    }), t.bind("click", function (e) {
      e.preventDefault();
      var t = jQuery(this),
          n = t.attr("data-for"),
          r = jQuery("#" + n + " span.download-wait>.countdown"),
          i = parseInt(t.attr("data-seconds")),
          a = t.attr("href");
      return t.fadeOut(250, function () {
        jQuery("#" + n).fadeIn(250, function () {
          var e = new Date();
          e.setSeconds(e.getSeconds() + i), r.countdown({
            until: e,
            format: "S",
            expiryUrl: a,
            onExpiry: function onExpiry() {
              jQuery("#" + n + " span.download-message").removeClass("hide"), jQuery("#" + n + " span.download-wait").addClass("hide");
            }
          });
        });
      }), !1;
    });
  });
}

function _masonryGallery() {
  jQuery(".masonry-gallery").length > 0 && jQuery(".masonry-gallery").each(function () {
    var e = jQuery(this),
        t = 4;
    e.hasClass("columns-2") ? t = 2 : e.hasClass("columns-3") ? t = 3 : e.hasClass("columns-4") ? t = 4 : e.hasClass("columns-5") ? t = 5 : e.hasClass("columns-6") && (t = 6);
    var n = e.find("a:eq(0)").outerWidth(),
        r = e.attr("data-img-big"),
        i = e.width(),
        a = i / t;
    (a = Math.floor(a)) * t >= i && e.css({
      "margin-right": "-1px"
    }), t < 6 && e.children("a").css({
      width: a + "px"
    }), parseInt(r) > 0 && (r = Number(r) - 1, e.find("a:eq(" + r + ")").css({
      width: 2 * n + "px"
    }), loadScript(plugin_path + "isotope/isotope.pkgd.min.js", function () {
      setTimeout(function () {
        e.isotope({
          masonry: {
            columnWidth: n
          }
        }), e.isotope("layout");
      }, 1e3);
    }));
  });
}

function _toastr(e, t, n, r) {
  var i = jQuery(".toastr-notify");
  i.length > 0 && 0 != e && loadScript(plugin_path + "toastr/toastr.js", function () {
    i.bind("click", function (e) {
      e.preventDefault();
      var t = jQuery(this).attr("data-message"),
          n = jQuery(this).attr("data-notifyType") || "default",
          r = jQuery(this).attr("data-position") || "top-right",
          i = "true" == jQuery(this).attr("data-progressBar"),
          a = "true" == jQuery(this).attr("data-closeButton"),
          o = "true" == jQuery(this).attr("data-debug"),
          s = "true" == jQuery(this).attr("data-newestOnTop"),
          l = "true" == jQuery(this).attr("data-preventDuplicates"),
          u = jQuery(this).attr("data-showDuration") || "300",
          c = jQuery(this).attr("data-hideDuration") || "1000",
          d = jQuery(this).attr("data-timeOut") || "5000",
          p = jQuery(this).attr("data-extendedTimeOut") || "1000",
          f = jQuery(this).attr("data-showEasing") || "swing",
          h = jQuery(this).attr("data-hideEasing") || "linear",
          m = jQuery(this).attr("data-showMethod") || "fadeIn",
          y = jQuery(this).attr("data-hideMethod") || "fadeOut";
      toastr.options = {
        closeButton: a,
        debug: o,
        newestOnTop: s,
        progressBar: i,
        positionClass: "toast-" + r,
        preventDuplicates: l,
        onclick: null,
        showDuration: u,
        hideDuration: c,
        timeOut: d,
        extendedTimeOut: p,
        showEasing: f,
        hideEasing: h,
        showMethod: m,
        hideMethod: y
      }, toastr[n](t);
    }), 0 != e && (onclick = 0 != r ? function () {
      window.location = r;
    } : null, toastr.options = {
      closeButton: !0,
      debug: !1,
      newestOnTop: !1,
      progressBar: !0,
      positionClass: "toast-" + t,
      preventDuplicates: !1,
      onclick: onclick,
      showDuration: "300",
      hideDuration: "1000",
      timeOut: "5000",
      extendedTimeOut: "1000",
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "fadeIn",
      hideMethod: "fadeOut"
    }, setTimeout(function () {
      toastr[n](e);
    }, 1500));
  });
}

function _charts() {
  jQuery(".piechart").length > 0 && loadScript(plugin_path + "chart.easypiechart/dist/jquery.easypiechart.min.js", function () {
    jQuery(".piechart").each(function () {
      var e = jQuery(this),
          t = e.attr("data-size") || 150,
          n = e.attr("data-animate") || "3000";
      e.easyPieChart({
        size: t,
        animate: n,
        scaleColor: !1,
        trackColor: e.attr("data-trackcolor") || "rgba(0,0,0,0.04)",
        lineWidth: e.attr("data-width") || "2",
        lineCap: "square",
        barColor: e.attr("data-color") || "#0093BF"
      }), jQuery("*", this).attr("style", "line-height:" + t + "px !important; height:" + t + "px !important; width:" + t + "px !important");
    });
  });
}

function _select2() {
  var e = jQuery("select.select2");
  e.length > 0 && loadScript(plugin_path + "select2/js/select2.full.min.js", function () {
    e.each(function () {
      var e = jQuery(this);
      e.hasClass("select2-custom") || e.select2();
    });
  });
}

function _form() {
  jQuery("form.validate-plugin").length > 0 && loadScript(plugin_path + "form.validate/jquery.form.min.js", function () {
    loadScript(plugin_path + "form.validate/jquery.validation.min.js");
  }), jQuery("form.validate").length > 0 && loadScript(plugin_path + "form.validate/jquery.form.min.js", function () {
    loadScript(plugin_path + "form.validate/jquery.validation.min.js", function () {
      jQuery().validate && jQuery("form.validate").each(function () {
        var e = jQuery(this),
            t = e.attr("data-success") || "Successfully! Thank you!",
            n = (e.attr("data-captcha"), e.attr("data-toastr-position") || "top-right"),
            r = e.attr("data-toastr-type") || "success";
        _Turl = e.attr("data-toastr-url") || !1, e.append('<input type="hidden" name="is_ajax" value="true" />'), e.validate({
          submitHandler: function submitHandler(e) {
            jQuery(e).find(".input-group-addon").find(".fa-envelope").removeClass("fa-envelope").addClass("fa-refresh fa-spin"), jQuery(e).ajaxSubmit({
              target: jQuery(e).find(".validate-result").length > 0 ? jQuery(e).find(".validate-result") : "",
              error: function error(e) {
                _toastr("Sent Failed!", n, "error", !1);
              },
              success: function success(i) {
                "_failed_" == (i = i.trim()) ? _toastr("SMTP ERROR! Please, check your config file!", n, "error", !1) : "_captcha_" == i ? _toastr("Invalid Captcha!", n, "error", !1) : (jQuery(e).find(".input-group-addon").find(".fa-refresh").removeClass("fa-refresh fa-spin").addClass("fa-envelope"), jQuery(e).find("input.form-control").val(""), _toastr(t, n, r, _Turl));
              }
            });
          }
        });
      });
    });
  });
  var e = jQuery("input.masked");
  e.length > 0 && loadScript(plugin_path + "form.masked/jquery.maskedinput.js", function () {
    e.each(function () {
      var e = jQuery(this);
      _format = e.attr("data-format") || "(999) 999-999999", _placeholder = e.attr("data-placeholder") || "X", jQuery.mask.definitions.f = "[A-Fa-f0-9]", e.mask(_format, {
        placeholder: _placeholder
      });
    });
  });
}

function _pickers() {
  var e = jQuery(".datepicker");
  e.length > 0 && loadScript(plugin_path + "bootstrap.datepicker/js/bootstrap-datepicker.min.js", function () {
    jQuery().datepicker && e.each(function () {
      var e = jQuery(this),
          t = e.attr("data-lang") || "en";
      "en" != t && "" != t && loadScript(plugin_path + "bootstrap.datepicker/locales/bootstrap-datepicker." + t + ".min.js"), jQuery(this).datepicker({
        format: e.attr("data-format") || "yyyy-mm-dd",
        language: t,
        rtl: "true" == e.attr("data-RTL"),
        changeMonth: "false" != e.attr("data-changeMonth"),
        todayBtn: "false" != e.attr("data-todayBtn") && "linked",
        calendarWeeks: "false" != e.attr("data-calendarWeeks"),
        autoclose: "false" != e.attr("data-autoclose"),
        todayHighlight: "false" != e.attr("data-todayHighlight"),
        onRender: function onRender(e) {}
      }).on("changeDate", function (e) {}).data("datepicker");
    });
  });
  var t = jQuery(".rangepicker");
  t.length > 0 && loadScript(plugin_path + "bootstrap.daterangepicker/moment.min.js", function () {
    loadScript(plugin_path + "bootstrap.daterangepicker/daterangepicker.js", function () {
      jQuery().datepicker && t.each(function () {
        var e = jQuery(this),
            t = e.attr("data-format").toUpperCase() || "YYYY-MM-DD";
        e.daterangepicker({
          format: t,
          startDate: e.attr("data-from"),
          endDate: e.attr("data-to"),
          ranges: {
            Today: [moment(), moment()],
            Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
            "Last 7 Days": [moment().subtract(6, "days"), moment()],
            "Last 30 Days": [moment().subtract(29, "days"), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")],
            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
          }
        }, function (e, t, n) {});
      });
    });
  });
  var n = jQuery(".timepicker");
  n.length > 0 && loadScript(plugin_path + "timepicki/timepicki.min.js", function () {
    jQuery().timepicki && n.timepicki();
  });
  var r = jQuery(".colorpicker");
  r.length > 0 && loadScript(plugin_path + "spectrum/spectrum.min.js", function () {
    jQuery().spectrum && r.each(function () {
      var _e$spectrum;

      var e = jQuery(this),
          t = e.attr("data-format") || "hex",
          n = e.attr("data-palletteOnly") || "false",
          r = e.attr("data-fullpicker") || "false",
          i = e.attr("data-allowEmpty") || !1;
      if (_flat = e.attr("data-flat") || !1, "true" == n || "true" == r) var a = [["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"], ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"], ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"], ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"], ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"], ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"], ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"], ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]];else a = null;
      e.attr("data-defaultColor") ? _color = e.attr("data-defaultColor") : _color = "#ff0000", e.attr("data-defaultColor") || "true" != i || (_color = null), e.spectrum((_e$spectrum = {
        showPaletteOnly: "true" == n,
        togglePaletteOnly: "true" == n,
        flat: "true" == _flat,
        showInitial: "true" == i,
        showInput: "true" == i,
        allowEmpty: "true" == i,
        chooseText: e.attr("data-chooseText") || "Coose",
        cancelText: e.attr("data-cancelText") || "Cancel",
        color: _color
      }, _defineProperty(_e$spectrum, "showInput", !0), _defineProperty(_e$spectrum, "showPalette", !0), _defineProperty(_e$spectrum, "preferredFormat", t), _defineProperty(_e$spectrum, "showAlpha", "rgb" == t), _defineProperty(_e$spectrum, "palette", a), _e$spectrum));
    });
  });
}

function _editors() {
  var e = jQuery("textarea.summernote");
  e.length > 0 && loadScript(plugin_path + "editor.summernote/summernote.min.js", function () {
    jQuery().summernote && e.each(function () {
      var e = jQuery(this).attr("data-lang") || "en-US";
      "en-US" != e && (alert(e), loadScript(plugin_path + "editor.summernote/lang/summernote-" + e + ".js")), jQuery(this).summernote({
        height: jQuery(this).attr("data-height") || 200,
        lang: jQuery(this).attr("data-lang") || "en-US",
        toolbar: [["style", ["style"]], ["fontsize", ["fontsize"]], ["style", ["bold", "italic", "underline", "strikethrough", "clear"]], ["color", ["color"]], ["para", ["ul", "ol", "paragraph"]], ["table", ["table"]], ["media", ["link", "picture", "video"]], ["misc", ["codeview", "fullscreen", "help"]]]
      });
    });
  });
  var t = jQuery("textarea.markdown");
  t.length > 0 && loadScript(plugin_path + "editor.markdown/js/bootstrap-markdown.min.js", function () {
    jQuery().markdown && t.each(function () {
      var e = jQuery(this),
          t = e.attr("data-lang") || "en";
      "en" != t && loadScript(plugin_path + "editor.markdown/locale/bootstrap-markdown." + t + ".js"), jQuery(this).markdown({
        autofocus: "true" == e.attr("data-autofocus"),
        savable: "true" == e.attr("data-savable"),
        height: e.attr("data-height") || "inherit",
        language: "en" == t ? null : t
      });
    });
  });
}

function _pajinate() {
  var e = jQuery("div.pajinate");
  e.length > 0 && loadScript(plugin_path + "pajinate/jquery.pajinate.bootstrap.min.js", function () {
    jQuery().pajinate && e.each(function () {
      var e = jQuery(this),
          t = e.attr("data-pajinante-items-per-page") || 8;
      _numLinks = e.attr("data-pajinante-num-links") || 5, e.pajinate({
        items_per_page: parseInt(t),
        num_page_links_to_display: parseInt(_numLinks),
        item_container_id: e.attr("data-pajinate-container") || ".pajinate-container",
        nav_panel_id: ".pajinate-nav ul",
        show_first_last: !1,
        wrap_around: !0,
        abort_on_small_lists: !0,
        start_page: 0,
        nav_label_prev: "&laquo;",
        nav_label_next: "&raquo;"
      });
    });
  });
}

function _infiniteScroll() {
  var e = jQuery(".infinite-scroll");
  e.length > 0 && loadScript(plugin_path + "infinite-scroll/jquery.infinitescroll.min.js", function () {
    _navSelector = e.attr("data-nextSelector") || "#inf-load-nex", _itemSelector = e.attr("data-itemSelector") || ".item", _nextSelector = _navSelector + " a", e.infinitescroll({
      loading: {
        finishedMsg: '<i class="fa fa-check"></i>',
        msgText: '<i class="fa fa-refresh fa-spin"></i>',
        img: "data:image/gif;base64,R0lGODlhGAAYAPUAABQSFCwuLBwaHAwKDKyurGxqbNze3CwqLCQmJLS2tOzu7OTi5JyenBweHBQWFJyanPz+/HRydLSytFxeXPz6/ExOTKSmpFRSVHR2dAwODAQCBOzq7PTy9ISChPT29IyKjIyOjISGhOTm5GRiZJSWlJSSlFRWVMTCxNza3ExKTNTS1KyqrHx6fGRmZKSipMzOzMTGxDQyNDw+PAQGBDQ2NERCRFxaXMzKzGxubDw6PCQiJLy+vERGRLy6vHx+fNTW1CH/C05FVFNDQVBFMi4wAwEAAAAh+QQJBQAAACwAAAAAGAAYAEAGqECAcAhoRAiojQJFiAiI0Kh0qOsZOhqhDMK9ZadgAI0WBmhAXAhFVm5HbZR0aTYdsFpSkwqjo5sRLAtpIjxuUzZpECmGjI1QA4JcKH5lGVICDHFpGyoqGx4uDWENFh4iKjcbiR4MT1ItLJSPJWkUNo9uAyhpBpaOGjdpOY7ExcYaIQs9OsUpibfENZoQIF9gY1EpqlwiLAh+M4AqJmUCOBJJGz8EOKJRQQAh+QQJBQABACwAAAAAGAAYAAAGp8CAcBhoRBILDgdFKAiI0KHAB5rUZBUWDALxMJ5R4SCmiWpoJ67iEm4TZx0upOCuB1jyir2tuXE3DnthE3IlglENchwDh0QDG3ITjUQ7ciGTQxFybJgBGkcYGhoYPaGdARdyOKchcjunhH8znQAccmCYJZGnDpAQN2WdFXI+pwEFch2znRe+MDTBbzGMbQIPHlwwLBcyNSMgLIF2Ai0WKAocBhI4uERBACH5BAkFACwALAAAAAAYABgAAAaoQJZwyNIEJiAJCpWICIjQKFGD6Gw8D4d0C3UQIJsKd1wsQSgFMldjgUAu6q1jA27EpRg34x5FUCAeT3xDAx5uBQAMJyZ8GRxuFiRuFAF3B24QKguYE3cpmAubbil3I5gGKpgIdwF/EA9tgAN8JicMGQVuHLODQgKGEKu9QgxuGMNCDQpgAMgsF38rGs4Ffx/TyBUiECtayAIPHgohAdi9DRFKTCAj5VJBACH5BAkFAAAALAAAAAAYABgAAAa0QIBwSAQMaphHoVFsOoezlsEleFqJDsnmcu1qLJBW9zpQUSpjqwyycQgPBAIiLYRBGIDMAgJRaegREB4CE3wQFAN0NHwRYHwwdAANfBIqhlx0AXwGCnx+kQV8Cp0QBZEaL3wbBnwBkReGKgl8TGkadnwugRA0dBkUhhMNHhARdBqWEAsZAAwQkHQIEgQHQgIbFDKRTRUUL4nbRC0QFjPhRBcbEm7nQg0uBi3g7Q0RDxEyzFdBACH5BAkFAAgALAAAAAAYABgAAAaxQIRwSCwKHMWkssgLCZbQYmNnUgpMh6gQoIoUZQqIh6ZFHDjV7QLCLpURIcUTAWKzvWUBhYFwcOwnA28IOx4CBXY3AIMIJRAFEmwoSIwYEAQGbDWMQiwQBh4QKpxCjhyhbqQqEByZLKQ1bAaRr4wOKGwSiKlvADd2BQIeJ4MDJ3YcSA8UlFqWdiBCAgohbyR2C4tCJhwBZTQUEAo5RQUqzVAHJuhDJjsNpFIhKfFG7FFBACH5BAkFAAAALAAAAQAYABYAAAa3QIBQmEnlNMOkcgmoGSCQEJNIY048UIhhKqS1lClKFtLjClmmoWAzvunMgJmqIWRkDTYkHIBxARpiECUDe0MIHg0RUCV6hQAaGxESEAszjkkvEk8sl0kqKgoQCJ1CGiIKChuNlwcQCigvpGcQKBKxpAMLEBI4IpaXGiVQODoeb44DwhAUAgAuGIUaEyhZDEINKr9cCDdjG81CJpxmO2MUPEojVVy6UBQ2TDGEUyFQCzKyjzk880NBACH5BAkFAAEALAAAAAAYABgAAAazwIBwGABMOhcNcckUOkoKiJTVrAYqG6k2YWXiKFptpEs0gbWbXmFmHQwbWcjNJlCSYwIhQ9qxk4UaVAIeEB1/TCANBRAnfodCExEEEDSPSzUJKCeWSzQGHBicRBUcHimiQywKC5WoGjAoCTKoATQUBBETqDMnEAUNH6ghEBQOAT6OZBo+UgxCAjF/Mw0TN1IKeUJuVTMFPSJhEBePGOHEBZYJ4SI8nCxaHB/GnBoXISYATUEAIfkECQUAKgAsAAAAABgAGAAABqpAlXCoErQsr4WBlCE6nQ2XB0Ktup5Yk6LKhZywzgKlyplSKRfwsELdYA6DDCI1OaiFgg2EALirHxAfGn5gDR4rg4RPGhEbDopYAQkdkFgjBnaVTiEoiZpDCQmfRBooIKNDBwYjqEIdCQGtDgoFnpoaEh4NqBogEA+oDisQjn4xExUIAAMILCIQFBV+JmNUHh7VEAWEMF1VCmmELt4UDAKQGSUoCy8WI+dPQQAh+QQJBQAJACwAAAAAGAAYAAAGrMCEcJhoRCQoxUblmmSI0KGA4YFYr9bFIUqsbLBgK4ErLFAosEiuESi8sBKyifKqRTWXk+el4zYULgNkQhkaZBYShoOLOigAi5ARE5CQDzOUixGYi3abXANPnlE5olyapUQzD6hELaesDgYNrAkzEi5kMwOKnxYbs1EIKh4wF5dQNSoQF2QSWC8FATo0GDcUHi2DBGFgGymLBwvcEBQPDpQZNi4qGxsoEjgCXEEAIfkEBQUACAAsAAAAABgAGAAABqZAhHCIEBQIBg/HICk4iNCh4OGBWK9WTgkQHZoUlFMJwyKpsJCFrBvhhJ7QGgqrgA9tr0BX6HhhTUQNO3Z7ADBWFAdEIQJ7UAMRJTREAjyOl0MNmJucnZ6foKGio6SdmqQphDljA5wCIUQBVRAwXJcAO6dCJlg3tl0BPxdQAgpYKDVRAh8cOF05C2g/JSw+JTAeCsOFJRxoVx4PjZgORygcHCgETl1BADs=",
        speed: "normal"
      },
      nextSelector: _nextSelector,
      navSelector: _navSelector,
      itemSelector: _itemSelector,
      behavior: "",
      state: {
        isDone: !1
      }
    }, function (t) {
      Init(!0), jQuery().isotope && (e.isotope("appended", jQuery(t)), setTimeout(function () {
        e.isotope("layout");
      }, 2e3));
    });
  });
}

function _zoom() {
  var e = jQuery("figure.zoom");
  e.length > 0 && loadScript(plugin_path + "image.zoom/jquery.zoom.min.js", function () {
    jQuery().zoom && e.each(function () {
      var e = jQuery(this),
          t = e.attr("data-mode"),
          n = e.attr("id");
      "grab" == t ? e.zoom({
        on: "grab"
      }) : "click" == t ? e.zoom({
        on: "click"
      }) : "toggle" == t ? e.zoom({
        on: "toggle"
      }) : e.zoom(), isMobile.any() && e.zoom({
        on: "toggle"
      }), n && jQuery(".zoom-more[data-for=" + n + "] a").bind("click", function (e) {
        e.preventDefault();
        var t = jQuery(this).attr("href");
        "#" != t && (jQuery(".zoom-more[data-for=" + n + "] a").removeClass("active"), jQuery(this).addClass("active"), jQuery("figure#" + n + ">.lightbox").attr("href", t), jQuery("figure#" + n + ">img").fadeOut(0, function () {
          jQuery("figure#" + n + ">img").attr("src", t);
        }).fadeIn(500));
      });
    });
  });
}

function _autosuggest() {
  _container = jQuery("div.autosuggest"), _container.length > 0 && loadScript(plugin_path + "typeahead.bundle.js", function () {
    jQuery().typeahead && _container.each(function () {
      var e = jQuery(this),
          t = e.attr("data-minLength") || 1,
          n = e.attr("data-queryURL"),
          r = e.attr("data-limit") || 10;
      if ("false" == e.attr("data-autoload")) return !1;
      var i = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace("value"),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        limit: r,
        remote: {
          url: n + "%QUERY"
        }
      });
      jQuery(".typeahead", e).typeahead({
        limit: r,
        hint: "false" != e.attr("data-hint"),
        highlight: "false" != e.attr("data-highlight"),
        minLength: parseInt(t),
        cache: !1
      }, {
        name: "_typeahead",
        source: i
      });
    });
  });
}

function _stepper() {
  var e = jQuery("input.stepper");
  e.length > 0 && loadScript(plugin_path + "form.stepper/jquery.stepper.min.js", function () {
    jQuery().stepper && jQuery(e).each(function () {
      var e = jQuery(this),
          t = e.attr("min") || null,
          n = e.attr("max") || null;
      e.stepper({
        limit: [t, n],
        floatPrecission: e.attr("data-floatPrecission") || 2,
        wheel_step: e.attr("data-wheelstep") || .1,
        arrow_step: e.attr("data-arrowstep") || .2,
        allowWheel: "false" != e.attr("data-mousescrool"),
        UI: "false" != e.attr("data-UI"),
        type: e.attr("data-type") || "float",
        preventWheelAcceleration: "false" != e.attr("data-preventWheelAcceleration"),
        incrementButton: e.attr("data-incrementButton") || "&blacktriangle;",
        decrementButton: e.attr("data-decrementButton") || "&blacktriangledown;",
        onStep: null,
        onWheel: null,
        onArrow: null,
        onButton: null,
        onKeyUp: null
      });
    });
  });
}

function _slimScroll() {
  jQuery(".slimscroll").length > 0 && loadScript(plugin_path + "slimscroll/jquery.slimscroll.min.js", function () {
    jQuery().slimScroll && jQuery(".slimscroll").each(function () {
      var _jQuery$slimScroll;

      var e;
      e = jQuery(this).attr("data-height") ? jQuery(this).attr("data-height") : jQuery(this).height(), jQuery(this).slimScroll((_jQuery$slimScroll = {
        size: jQuery(this).attr("data-size") || "5px",
        opacity: jQuery(this).attr("data-opacity") || .6,
        position: jQuery(this).attr("data-position") || "right",
        allowPageScroll: !1,
        disableFadeOut: !1,
        railVisible: !0,
        railColor: jQuery(this).attr("data-railColor") || "#222",
        railOpacity: jQuery(this).attr("data-railOpacity") || .05,
        alwaysVisible: "false" != jQuery(this).attr("data-alwaysVisible")
      }, _defineProperty(_jQuery$slimScroll, "railVisible", "false" != jQuery(this).attr("data-railVisible")), _defineProperty(_jQuery$slimScroll, "color", jQuery(this).attr("data-color") || "#333"), _defineProperty(_jQuery$slimScroll, "wrapperClass", jQuery(this).attr("data-wrapper-class") || "slimScrollDiv"), _defineProperty(_jQuery$slimScroll, "railColor", jQuery(this).attr("data-railColor") || "#eaeaea"), _defineProperty(_jQuery$slimScroll, "height", e), _jQuery$slimScroll)), "true" == jQuery(this).attr("disable-body-scroll") && jQuery(this).bind("mousewheel DOMMouseScroll", function (e) {
        var t = null;
        "mousewheel" == e.type ? t = -1 * e.originalEvent.wheelDelta : "DOMMouseScroll" == e.type && (t = 40 * e.originalEvent.detail), t && (e.preventDefault(), jQuery(this).scrollTop(t + jQuery(this).scrollTop()));
      });
    });
  });
}

function _modalAutoLoad() {
  jQuery("div.modal").length > 0 && jQuery("div.modal").each(function () {
    var e = jQuery(this),
        t = e.attr("id"),
        n = e.attr("data-autoload") || !1;
    "" != t && "hidden" == localStorage.getItem(t) && (n = "false"), "true" == n && jQuery(window).on("load", function () {
      var t = e.attr("data-autoload-delay") || 1e3;
      setTimeout(function () {
        e.modal("toggle");
      }, parseInt(t));
    }), jQuery("input.loadModalHide", this).bind("click", function () {
      jQuery(this).is(":checked") ? (localStorage.setItem(t, "hidden"), console.log("[Modal Autoload #" + t + "] Added to localStorage")) : (localStorage.removeItem(t), console.log("[Modal Autoload #" + t + "] Removed from localStorage"));
    });
  });
}

function _bgimage() {
  var e = jQuery("section[data-background], section div[data-background]");
  e.length > 0 && loadScript(plugin_path + "jquery.backstretch.min.js", function () {
    jQuery(e).each(function () {
      var e = jQuery(this),
          t = e.attr("data-background") || "";

      if ("" != t) {
        var n = e.attr("data-background-delay") || 3e3,
            r = e.attr("data-background-fade") || 750,
            i = t.split(",");
        (i = t.replace(" ", "").split(","))[1] ? e.backstretch(i, {
          duration: parseInt(n),
          fade: parseInt(r)
        }) : e.backstretch(i), jQuery(".bs-next", e).bind("click", function (t) {
          t.preventDefault(), e.data("backstretch").next();
        }), jQuery(".bs-prev", e).bind("click", function (t) {
          t.preventDefault(), e.data("backstretch").prev();
        }), jQuery(window).resize(function () {
          window.afterResizeBkstr && clearTimeout(window.afterResizeBkstr), window.afterResizeBkstr = setTimeout(function () {
            e.data("backstretch").next();
          }, 350);
        });
      }
    });
  });
  var t = jQuery("body").attr("data-background") || "";
  "" != t && loadScript(plugin_path + "jquery.backstretch.min.js", function () {
    t && (jQuery.backstretch(t), jQuery("body").addClass("transparent"));
  });
}

function _stickyKit() {
  jQuery(".sticky-kit").length < 1 || window.width < 960 || loadScript(plugin_path + "jquery.sticky-kit/jquery.sticky-kit.min.js", function () {
    jQuery(".sticky-kit").each(function () {
      var e = jQuery(this),
          t = e.data("offset") || Number(jQuery("#header").outerHeight());
      e.stick_in_parent({
        offset_top: Number(t)
      });
    });
  });
}

function _cookie_alert() {
  var e = jQuery("#cookie-alert"),
      t = _getCookie("cookie-alert");

  if (e.length > 0 && null == t) {
    var n = e.attr("data-expire") || 30;
    e.hasClass("alert-position-bottom") ? e.animate({
      bottom: "0px"
    }, 800, "easeInOutExpo") : e.animate({
      top: "0px"
    }, 800, "easeInOutExpo"), jQuery("button", e).bind("click", function () {
      _setCookie("cookie-alert", "closed", Number(n));
    });
  }

  e.length > 0 && e.hasClass("cookie-reset") && _delCookie("cookie-alert");
}

function _widget_flickr() {
  var e = jQuery(".widget-flickr");
  e.length > 0 && loadScript(plugin_path + "widget.jflickr/jflickrfeed.min.js", function () {
    jQuery().jflickrfeed && jQuery(".widget-flickr") && e.each(function () {
      var e = jQuery(this),
          t = e.attr("data-id"),
          n = e.attr("data-limit") || 14;
      e.jflickrfeed({
        limit: parseInt(n),
        qstrings: {
          id: t
        },
        itemTemplate: '<li><a href="{{image}}" title="{{title}}"><img src="{{image_s}}" alt="{{title}}" width="63" height="63" /></a></li>'
      }, function (e) {
        _lightbox();
      });
    });
  });
}

function _widget_twitter() {
  var e = jQuery(".widget-twitter");
  e.length > 0 && loadScript(plugin_path + "widget.twittie/twittie.min.js", function () {
    jQuery().twittie && e.each(function () {
      var e = jQuery(this),
          t = e.attr("data-php") + "?username=" + e.attr("data-username") + "&limit=" + (e.attr("data-limit") || 3);
      jQuery.getJSON(t, function (t) {
        e.html(format_twitter(t));
      });
    });
  });
}

function format_twitter(e) {
  for (var t = [], n = 0; n < e.length; n++) {
    var r = e[n].user.screen_name,
        i = e[n].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function (e) {
      return '<a href="' + e + '" target="_blank">' + e + "</a>";
    }).replace(/\B@([_a-z0-9]+)/gi, function (e) {
      return e.charAt(0) + '<a href="http://twitter.com/' + e.substring(1) + '" target="_blank">' + e.substring(1) + "</a>";
    });
    t.push('<li><i class="fa fa-twitter"></i><span>' + i + '</span><small><a href="http://twitter.com/' + r + "/statuses/" + e[n].id_str + '" target="_blank">' + relative_time(e[n].created_at) + "</a></small></li>");
  }

  return t.join("");
}

function relative_time(e) {
  var t = e.split(" "),
      n = Date.parse(e),
      r = arguments.length > 1 ? arguments[1] : new Date(),
      i = parseInt((r.getTime() - n) / 1e3);
  return e = t[1] + " " + t[2] + ", " + t[5] + " " + t[3], (i += 60 * r.getTimezoneOffset()) < 60 ? "less than a minute ago" : i < 120 ? "about a minute ago" : i < 3600 ? parseInt(i / 60).toString() + " minutes ago" : i < 7200 ? "about an hour ago" : i < 86400 ? "about " + parseInt(i / 3600).toString() + " hours ago" : i < 172800 ? "1 day ago" : parseInt(i / 86400).toString() + " days ago";
}

function _widget_facebook() {
  var e,
      t,
      n,
      r,
      i = jQuery("div.fb-like"),
      a = jQuery("div.fb-share-button");
  (i.length > 0 || a.length > 0) && (jQuery("body").append('<div id="fb-root"></div>'), e = document, t = "facebook-jssdk", r = e.getElementsByTagName("script")[0], e.getElementById(t) || ((n = e.createElement("script")).id = t, n.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3", r.parentNode.insertBefore(n, r)));
}

function _widget_dribbble() {
  var e = jQuery(".widget-dribbble");
  e.length > 0 && loadScript(plugin_path + "widget.dribbble/jribbble.min.js", function () {
    var t = e.attr("data-token") || "f688ac519289f19ce5cebc1383c15ad5c02bd58205cd83c86cbb0ce09170c1b4",
        n = e.attr("data-target") || "_blank",
        r = e.attr("data-shots") || 2046896;
    jQuery.jribbble.setToken(t), jQuery.jribbble.shots(r).rebounds().then(function (t) {
      var r = [];
      t.forEach(function (e) {
        r.push("<li>"), r.push('<a href="' + e.html_url + '" target="' + n + '">'), r.push('<img class="img-fluid" src="' + e.images.normal + '" alt="image">'), r.push("</a></li>");
      }), e.html(r.join(""));
    });
  });
}

function _widget_media() {
  jQuery(".widget-media").length > 0 && loadScript(plugin_path + "widget.mediaelementbuild/mediaelement-and-player.min.js", function () {});
} // /pofweb/.test(self.location.href) || /wcdn/.test(self.location.href) || /tstrap/.test(self.location.href) || (window.location = "http://www.stepofweb.com/templates.html");


var isMobile = {
  iOS: function iOS() {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
  },
  Android: function Android() {
    return navigator.userAgent.match(/Android/i);
  },
  BlackBerry: function BlackBerry() {
    return navigator.userAgent.match(/BlackBerry/i);
  },
  Opera: function Opera() {
    return navigator.userAgent.match(/Opera Mini/i);
  },
  Windows: function Windows() {
    return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
  },
  any: function any() {
    return isMobile.iOS() || isMobile.Android() || isMobile.BlackBerry() || isMobile.Opera() || isMobile.Windows();
  }
};

function wheel(e) {
  e.preventDefault();
}

function disable_scroll() {
  window.addEventListener && window.addEventListener("DOMMouseScroll", wheel, !1), window.onmousewheel = document.onmousewheel = wheel;
}

function enable_scroll() {
  window.removeEventListener && window.removeEventListener("DOMMouseScroll", wheel, !1), window.onmousewheel = document.onmousewheel = document.onkeydown = null;
}

function enable_overlay() {
  jQuery("span.global-overlay").remove(), jQuery("body").append('<span class="global-overlay"></span>');
}

function disable_overlay() {
  jQuery("span.global-overlay").remove();
}

function _setCookie(e, t, n) {
  var r = "";

  if (n) {
    var i = new Date();
    i.setTime(i.getTime() + 24 * n * 60 * 60 * 1e3), r = "; expires=" + i.toUTCString();
  }

  document.cookie = e + "=" + t + r + "; path=/";
}

function _getCookie(e) {
  for (var t = e + "=", n = document.cookie.split(";"), r = 0; r < n.length; r++) {
    for (var i = n[r]; " " == i.charAt(0);) {
      i = i.substring(1, i.length);
    }

    if (0 == i.indexOf(t)) return i.substring(t.length, i.length);
  }

  return null;
}

function _delCookie(e) {
  _setCookie(e, "", -1);
}

function _loadPopperBS4() {
  var e, t;
  e = this, t = function t() {
    "use strict";

    function e(e) {
      return e && "[object Function]" === {}.toString.call(e);
    }

    function t(e, t) {
      if (1 !== e.nodeType) return [];
      var n = getComputedStyle(e, null);
      return t ? n[t] : n;
    }

    function n(e) {
      return "HTML" === e.nodeName ? e : e.parentNode || e.host;
    }

    function r(e) {
      if (!e) return document.body;

      switch (e.nodeName) {
        case "HTML":
        case "BODY":
          return e.ownerDocument.body;

        case "#document":
          return e.body;
      }

      var i = t(e),
          a = i.overflow,
          o = i.overflowX,
          s = i.overflowY;
      return /(auto|scroll)/.test(a + s + o) ? e : r(n(e));
    }

    function i(e) {
      var n = e && e.offsetParent,
          r = n && n.nodeName;
      return r && "BODY" !== r && "HTML" !== r ? -1 !== ["TD", "TABLE"].indexOf(n.nodeName) && "static" === t(n, "position") ? i(n) : n : e ? e.ownerDocument.documentElement : document.documentElement;
    }

    function a(e) {
      return null === e.parentNode ? e : a(e.parentNode);
    }

    function o(e, t) {
      if (!(e && e.nodeType && t && t.nodeType)) return document.documentElement;
      var n = e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
          r = n ? e : t,
          s = n ? t : e,
          l = document.createRange();
      l.setStart(r, 0), l.setEnd(s, 0);
      var u,
          c,
          d = l.commonAncestorContainer;
      if (e !== d && t !== d || r.contains(s)) return u = d, c = u.nodeName, "BODY" === c || "HTML" !== c && i(u.firstElementChild) !== u ? i(d) : d;
      var p = a(e);
      return p.host ? o(p.host, t) : o(e, a(t).host);
    }

    function s(e) {
      var t = "top" === (1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "top") ? "scrollTop" : "scrollLeft",
          n = e.nodeName;

      if ("BODY" === n || "HTML" === n) {
        var r = e.ownerDocument.documentElement;
        return (e.ownerDocument.scrollingElement || r)[t];
      }

      return e[t];
    }

    function l(e, t) {
      var n = "x" === t ? "Left" : "Top",
          r = "Left" == n ? "Right" : "Bottom";
      return parseFloat(e["border" + n + "Width"], 10) + parseFloat(e["border" + r + "Width"], 10);
    }

    function u(e, t, n, r) {
      return M(t["offset" + e], t["scroll" + e], n["client" + e], n["offset" + e], n["scroll" + e], L() ? n["offset" + e] + r["margin" + ("Height" === e ? "Top" : "Left")] + r["margin" + ("Height" === e ? "Bottom" : "Right")] : 0);
    }

    function c() {
      var e = document.body,
          t = document.documentElement,
          n = L() && getComputedStyle(t);
      return {
        height: u("Height", e, t, n),
        width: u("Width", e, t, n)
      };
    }

    function d(e) {
      return W({}, e, {
        right: e.left + e.width,
        bottom: e.top + e.height
      });
    }

    function p(e) {
      var n = {};
      if (L()) try {
        n = e.getBoundingClientRect();
        var r = s(e, "top"),
            i = s(e, "left");
        n.top += r, n.left += i, n.bottom += r, n.right += i;
      } catch (e) {} else n = e.getBoundingClientRect();
      var a = {
        left: n.left,
        top: n.top,
        width: n.right - n.left,
        height: n.bottom - n.top
      },
          o = "HTML" === e.nodeName ? c() : {},
          u = o.width || e.clientWidth || a.right - a.left,
          p = o.height || e.clientHeight || a.bottom - a.top,
          f = e.offsetWidth - u,
          h = e.offsetHeight - p;

      if (f || h) {
        var m = t(e);
        f -= l(m, "x"), h -= l(m, "y"), a.width -= f, a.height -= h;
      }

      return d(a);
    }

    function f(e, n) {
      var i = L(),
          a = "HTML" === n.nodeName,
          o = p(e),
          l = p(n),
          u = r(e),
          c = t(n),
          f = parseFloat(c.borderTopWidth, 10),
          h = parseFloat(c.borderLeftWidth, 10),
          m = d({
        top: o.top - l.top - f,
        left: o.left - l.left - h,
        width: o.width,
        height: o.height
      });

      if (m.marginTop = 0, m.marginLeft = 0, !i && a) {
        var y = parseFloat(c.marginTop, 10),
            g = parseFloat(c.marginLeft, 10);
        m.top -= f - y, m.bottom -= f - y, m.left -= h - g, m.right -= h - g, m.marginTop = y, m.marginLeft = g;
      }

      return (i ? n.contains(u) : n === u && "BODY" !== u.nodeName) && (m = function (e, t) {
        var n = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
            r = s(t, "top"),
            i = s(t, "left"),
            a = n ? -1 : 1;
        return e.top += r * a, e.bottom += r * a, e.left += i * a, e.right += i * a, e;
      }(m, n)), m;
    }

    function h(e, i, a, l) {
      var u,
          p,
          h,
          m,
          y,
          g,
          v,
          j = {
        top: 0,
        left: 0
      },
          w = o(e, i);
      if ("viewport" === l) u = w, p = u.ownerDocument.documentElement, h = f(u, p), m = M(p.clientWidth, window.innerWidth || 0), y = M(p.clientHeight, window.innerHeight || 0), g = s(p), v = s(p, "left"), j = d({
        top: g - h.top + h.marginTop,
        left: v - h.left + h.marginLeft,
        width: m,
        height: y
      });else {
        var Q;
        "scrollParent" === l ? "BODY" === (Q = r(n(i))).nodeName && (Q = e.ownerDocument.documentElement) : Q = "window" === l ? e.ownerDocument.documentElement : l;
        var b = f(Q, w);
        if ("HTML" !== Q.nodeName || function e(r) {
          var i = r.nodeName;
          return "BODY" !== i && "HTML" !== i && ("fixed" === t(r, "position") || e(n(r)));
        }(w)) j = b;else {
          var _ = c(),
              C = _.height,
              A = _.width;

          j.top += b.top - b.marginTop, j.bottom = C + b.top, j.left += b.left - b.marginLeft, j.right = A + b.left;
        }
      }
      return j.left += a, j.top += a, j.right -= a, j.bottom -= a, j;
    }

    function m(e, t, n, r, i) {
      var a = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
      if (-1 === e.indexOf("auto")) return e;
      var o = h(n, r, a, i),
          s = {
        top: {
          width: o.width,
          height: t.top - o.top
        },
        right: {
          width: o.right - t.right,
          height: o.height
        },
        bottom: {
          width: o.width,
          height: o.bottom - t.bottom
        },
        left: {
          width: t.left - o.left,
          height: o.height
        }
      },
          l = Object.keys(s).map(function (e) {
        return W({
          key: e
        }, s[e], {
          area: (t = s[e], t.width * t.height)
        });
        var t;
      }).sort(function (e, t) {
        return t.area - e.area;
      }),
          u = l.filter(function (e) {
        var t = e.width,
            r = e.height;
        return t >= n.clientWidth && r >= n.clientHeight;
      }),
          c = 0 < u.length ? u[0].key : l[0].key,
          d = e.split("-")[1];
      return c + (d ? "-" + d : "");
    }

    function y(e, t, n) {
      return f(n, o(t, n));
    }

    function g(e) {
      var t = getComputedStyle(e),
          n = parseFloat(t.marginTop) + parseFloat(t.marginBottom),
          r = parseFloat(t.marginLeft) + parseFloat(t.marginRight);
      return {
        width: e.offsetWidth + r,
        height: e.offsetHeight + n
      };
    }

    function v(e) {
      var t = {
        left: "right",
        right: "left",
        bottom: "top",
        top: "bottom"
      };
      return e.replace(/left|right|bottom|top/g, function (e) {
        return t[e];
      });
    }

    function j(e, t, n) {
      n = n.split("-")[0];
      var r = g(e),
          i = {
        width: r.width,
        height: r.height
      },
          a = -1 !== ["right", "left"].indexOf(n),
          o = a ? "top" : "left",
          s = a ? "left" : "top",
          l = a ? "height" : "width",
          u = a ? "width" : "height";
      return i[o] = t[o] + t[l] / 2 - r[l] / 2, i[s] = n === s ? t[s] - r[u] : t[v(s)], i;
    }

    function w(e, t) {
      return Array.prototype.find ? e.find(t) : e.filter(t)[0];
    }

    function Q(t, n, r) {
      return (void 0 === r ? t : t.slice(0, function (e, t, n) {
        if (Array.prototype.findIndex) return e.findIndex(function (e) {
          return e[t] === n;
        });
        var r = w(e, function (e) {
          return e[t] === n;
        });
        return e.indexOf(r);
      }(t, "name", r))).forEach(function (t) {
        t.function && console.warn("`modifier.function` is deprecated, use `modifier.fn`!");
        var r = t.function || t.fn;
        t.enabled && e(r) && (n.offsets.popper = d(n.offsets.popper), n.offsets.reference = d(n.offsets.reference), n = r(n, t));
      }), n;
    }

    function b(e, t) {
      return e.some(function (e) {
        var n = e.name;
        return e.enabled && n === t;
      });
    }

    function _(e) {
      for (var t = [!1, "ms", "Webkit", "Moz", "O"], n = e.charAt(0).toUpperCase() + e.slice(1), r = 0; r < t.length - 1; r++) {
        var i = t[r],
            a = i ? "" + i + n : e;
        if (void 0 !== document.body.style[a]) return a;
      }

      return null;
    }

    function C(e) {
      var t = e.ownerDocument;
      return t ? t.defaultView : window;
    }

    function A(e, t, n, i) {
      n.updateBound = i, C(e).addEventListener("resize", n.updateBound, {
        passive: !0
      });
      var a = r(e);
      return function e(t, n, i, a) {
        var o = "BODY" === t.nodeName,
            s = o ? t.ownerDocument.defaultView : t;
        s.addEventListener(n, i, {
          passive: !0
        }), o || e(r(s.parentNode), n, i, a), a.push(s);
      }(a, "scroll", n.updateBound, n.scrollParents), n.scrollElement = a, n.eventsEnabled = !0, n;
    }

    function k() {
      var e, t;
      this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = (e = this.reference, t = this.state, C(e).removeEventListener("resize", t.updateBound), t.scrollParents.forEach(function (e) {
        e.removeEventListener("scroll", t.updateBound);
      }), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t));
    }

    function x(e) {
      return "" !== e && !isNaN(parseFloat(e)) && isFinite(e);
    }

    function S(e, t) {
      Object.keys(t).forEach(function (n) {
        var r = "";
        -1 !== ["width", "height", "top", "right", "bottom", "left"].indexOf(n) && x(t[n]) && (r = "px"), e.style[n] = t[n] + r;
      });
    }

    function E(e, t, n) {
      var r = w(e, function (e) {
        return e.name === t;
      }),
          i = !!r && e.some(function (e) {
        return e.name === n && e.enabled && e.order < r.order;
      });

      if (!i) {
        var a = "`" + t + "`";
        console.warn("`" + n + "` modifier is required by " + a + " modifier in order to work, be sure to include it before " + a + "!");
      }

      return i;
    }

    function I(e) {
      var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
          n = Y.indexOf(e),
          r = Y.slice(n + 1).concat(Y.slice(0, n));
      return t ? r.reverse() : r;
    }

    function T(e, t, n, r) {
      var i = [0, 0],
          a = -1 !== ["right", "left"].indexOf(r),
          o = e.split(/(\+|\-)/).map(function (e) {
        return e.trim();
      }),
          s = o.indexOf(w(o, function (e) {
        return -1 !== e.search(/,|\s/);
      }));
      o[s] && -1 === o[s].indexOf(",") && console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead.");
      var l = /\s*,\s*|\s+/,
          u = -1 === s ? [o] : [o.slice(0, s).concat([o[s].split(l)[0]]), [o[s].split(l)[1]].concat(o.slice(s + 1))];
      return (u = u.map(function (e, r) {
        var i = (1 === r ? !a : a) ? "height" : "width",
            o = !1;
        return e.reduce(function (e, t) {
          return "" === e[e.length - 1] && -1 !== ["+", "-"].indexOf(t) ? (e[e.length - 1] = t, o = !0, e) : o ? (e[e.length - 1] += t, o = !1, e) : e.concat(t);
        }, []).map(function (e) {
          return function (e, t, n, r) {
            var i = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                a = +i[1],
                o = i[2];
            if (!a) return e;

            if (0 === o.indexOf("%")) {
              var s;

              switch (o) {
                case "%p":
                  s = n;
                  break;

                case "%":
                case "%r":
                default:
                  s = r;
              }

              return d(s)[t] / 100 * a;
            }

            return "vh" === o || "vw" === o ? ("vh" === o ? M(document.documentElement.clientHeight, window.innerHeight || 0) : M(document.documentElement.clientWidth, window.innerWidth || 0)) / 100 * a : a;
          }(e, i, t, n);
        });
      })).forEach(function (e, t) {
        e.forEach(function (n, r) {
          x(n) && (i[t] += n * ("-" === e[r - 1] ? -1 : 1));
        });
      }), i;
    }

    for (var O = Math.min, B = Math.floor, M = Math.max, D = "undefined" != typeof window && "undefined" != typeof document, H = ["Edge", "Trident", "Firefox"], N = 0, P = 0; P < H.length; P += 1) {
      if (D && 0 <= navigator.userAgent.indexOf(H[P])) {
        N = 1;
        break;
      }
    }

    var z,
        F = D && window.Promise ? function (e) {
      var t = !1;
      return function () {
        t || (t = !0, window.Promise.resolve().then(function () {
          t = !1, e();
        }));
      };
    } : function (e) {
      var t = !1;
      return function () {
        t || (t = !0, setTimeout(function () {
          t = !1, e();
        }, N));
      };
    },
        L = function L() {
      return void 0 == z && (z = -1 !== navigator.appVersion.indexOf("MSIE 10")), z;
    },
        q = function q(e, t) {
      if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
    },
        R = function () {
      function e(e, t) {
        for (var n, r = 0; r < t.length; r++) {
          n = t[r], n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n);
        }
      }

      return function (t, n, r) {
        return n && e(t.prototype, n), r && e(t, r), t;
      };
    }(),
        U = function U(e, t, n) {
      return t in e ? Object.defineProperty(e, t, {
        value: n,
        enumerable: !0,
        configurable: !0,
        writable: !0
      }) : e[t] = n, e;
    },
        W = Object.assign || function (e) {
      for (var t, n = 1; n < arguments.length; n++) {
        for (var r in t = arguments[n], t) {
          Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r]);
        }
      }

      return e;
    },
        G = ["auto-start", "auto", "auto-end", "top-start", "top", "top-end", "right-start", "right", "right-end", "bottom-end", "bottom", "bottom-start", "left-end", "left", "left-start"],
        Y = G.slice(3),
        K = "flip",
        J = "clockwise",
        V = "counterclockwise",
        Z = function () {
      function t(n, r) {
        var i = this,
            a = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {};
        q(this, t), this.scheduleUpdate = function () {
          return requestAnimationFrame(i.update);
        }, this.update = F(this.update.bind(this)), this.options = W({}, t.Defaults, a), this.state = {
          isDestroyed: !1,
          isCreated: !1,
          scrollParents: []
        }, this.reference = n && n.jquery ? n[0] : n, this.popper = r && r.jquery ? r[0] : r, this.options.modifiers = {}, Object.keys(W({}, t.Defaults.modifiers, a.modifiers)).forEach(function (e) {
          i.options.modifiers[e] = W({}, t.Defaults.modifiers[e] || {}, a.modifiers ? a.modifiers[e] : {});
        }), this.modifiers = Object.keys(this.options.modifiers).map(function (e) {
          return W({
            name: e
          }, i.options.modifiers[e]);
        }).sort(function (e, t) {
          return e.order - t.order;
        }), this.modifiers.forEach(function (t) {
          t.enabled && e(t.onLoad) && t.onLoad(i.reference, i.popper, i.options, t, i.state);
        }), this.update();
        var o = this.options.eventsEnabled;
        o && this.enableEventListeners(), this.state.eventsEnabled = o;
      }

      return R(t, [{
        key: "update",
        value: function value() {
          return function () {
            if (!this.state.isDestroyed) {
              var e = {
                instance: this,
                styles: {},
                arrowStyles: {},
                attributes: {},
                flipped: !1,
                offsets: {}
              };
              e.offsets.reference = y(this.state, this.popper, this.reference), e.placement = m(this.options.placement, e.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding), e.originalPlacement = e.placement, e.offsets.popper = j(this.popper, e.offsets.reference, e.placement), e.offsets.popper.position = "absolute", e = Q(this.modifiers, e), this.state.isCreated ? this.options.onUpdate(e) : (this.state.isCreated = !0, this.options.onCreate(e));
            }
          }.call(this);
        }
      }, {
        key: "destroy",
        value: function value() {
          return function () {
            return this.state.isDestroyed = !0, b(this.modifiers, "applyStyle") && (this.popper.removeAttribute("x-placement"), this.popper.style.left = "", this.popper.style.position = "", this.popper.style.top = "", this.popper.style[_("transform")] = ""), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this;
          }.call(this);
        }
      }, {
        key: "enableEventListeners",
        value: function value() {
          return function () {
            this.state.eventsEnabled || (this.state = A(this.reference, this.options, this.state, this.scheduleUpdate));
          }.call(this);
        }
      }, {
        key: "disableEventListeners",
        value: function value() {
          return k.call(this);
        }
      }]), t;
    }();

    return Z.Utils = ("undefined" == typeof window ? global : window).PopperUtils, Z.placements = G, Z.Defaults = {
      placement: "bottom",
      eventsEnabled: !0,
      removeOnDestroy: !1,
      onCreate: function onCreate() {},
      onUpdate: function onUpdate() {},
      modifiers: {
        shift: {
          order: 100,
          enabled: !0,
          fn: function fn(e) {
            var t = e.placement,
                n = t.split("-")[0],
                r = t.split("-")[1];

            if (r) {
              var i = e.offsets,
                  a = i.reference,
                  o = i.popper,
                  s = -1 !== ["bottom", "top"].indexOf(n),
                  l = s ? "left" : "top",
                  u = s ? "width" : "height",
                  c = {
                start: U({}, l, a[l]),
                end: U({}, l, a[l] + a[u] - o[u])
              };
              e.offsets.popper = W({}, o, c[r]);
            }

            return e;
          }
        },
        offset: {
          order: 200,
          enabled: !0,
          fn: function fn(e, t) {
            var n,
                r = t.offset,
                i = e.placement,
                a = e.offsets,
                o = a.popper,
                s = a.reference,
                l = i.split("-")[0];
            return n = x(+r) ? [+r, 0] : T(r, o, s, l), "left" === l ? (o.top += n[0], o.left -= n[1]) : "right" === l ? (o.top += n[0], o.left += n[1]) : "top" === l ? (o.left += n[0], o.top -= n[1]) : "bottom" === l && (o.left += n[0], o.top += n[1]), e.popper = o, e;
          },
          offset: 0
        },
        preventOverflow: {
          order: 300,
          enabled: !0,
          fn: function fn(e, t) {
            var n = t.boundariesElement || i(e.instance.popper);
            e.instance.reference === n && (n = i(n));
            var r = h(e.instance.popper, e.instance.reference, t.padding, n);
            t.boundaries = r;
            var a = t.priority,
                o = e.offsets.popper,
                s = {
              primary: function primary(e) {
                var n = o[e];
                return o[e] < r[e] && !t.escapeWithReference && (n = M(o[e], r[e])), U({}, e, n);
              },
              secondary: function secondary(e) {
                var n = "right" === e ? "left" : "top",
                    i = o[n];
                return o[e] > r[e] && !t.escapeWithReference && (i = O(o[n], r[e] - ("right" === e ? o.width : o.height))), U({}, n, i);
              }
            };
            return a.forEach(function (e) {
              var t = -1 === ["left", "top"].indexOf(e) ? "secondary" : "primary";
              o = W({}, o, s[t](e));
            }), e.offsets.popper = o, e;
          },
          priority: ["left", "right", "top", "bottom"],
          padding: 5,
          boundariesElement: "scrollParent"
        },
        keepTogether: {
          order: 400,
          enabled: !0,
          fn: function fn(e) {
            var t = e.offsets,
                n = t.popper,
                r = t.reference,
                i = e.placement.split("-")[0],
                a = B,
                o = -1 !== ["top", "bottom"].indexOf(i),
                s = o ? "right" : "bottom",
                l = o ? "left" : "top",
                u = o ? "width" : "height";
            return n[s] < a(r[l]) && (e.offsets.popper[l] = a(r[l]) - n[u]), n[l] > a(r[s]) && (e.offsets.popper[l] = a(r[s])), e;
          }
        },
        arrow: {
          order: 500,
          enabled: !0,
          fn: function fn(e, n) {
            var r;
            if (!E(e.instance.modifiers, "arrow", "keepTogether")) return e;
            var i = n.element;

            if ("string" == typeof i) {
              if (!(i = e.instance.popper.querySelector(i))) return e;
            } else if (!e.instance.popper.contains(i)) return console.warn("WARNING: `arrow.element` must be child of its popper element!"), e;

            var a = e.placement.split("-")[0],
                o = e.offsets,
                s = o.popper,
                l = o.reference,
                u = -1 !== ["left", "right"].indexOf(a),
                c = u ? "height" : "width",
                p = u ? "Top" : "Left",
                f = p.toLowerCase(),
                h = u ? "left" : "top",
                m = u ? "bottom" : "right",
                y = g(i)[c];
            l[m] - y < s[f] && (e.offsets.popper[f] -= s[f] - (l[m] - y)), l[f] + y > s[m] && (e.offsets.popper[f] += l[f] + y - s[m]), e.offsets.popper = d(e.offsets.popper);
            var v = l[f] + l[c] / 2 - y / 2,
                j = t(e.instance.popper),
                w = parseFloat(j["margin" + p], 10),
                Q = parseFloat(j["border" + p + "Width"], 10),
                b = v - e.offsets.popper[f] - w - Q;
            return b = M(O(s[c] - y, b), 0), e.arrowElement = i, e.offsets.arrow = (U(r = {}, f, Math.round(b)), U(r, h, ""), r), e;
          },
          element: "[x-arrow]"
        },
        flip: {
          order: 600,
          enabled: !0,
          fn: function fn(e, t) {
            if (b(e.instance.modifiers, "inner")) return e;
            if (e.flipped && e.placement === e.originalPlacement) return e;
            var n = h(e.instance.popper, e.instance.reference, t.padding, t.boundariesElement),
                r = e.placement.split("-")[0],
                i = v(r),
                a = e.placement.split("-")[1] || "",
                o = [];

            switch (t.behavior) {
              case K:
                o = [r, i];
                break;

              case J:
                o = I(r);
                break;

              case V:
                o = I(r, !0);
                break;

              default:
                o = t.behavior;
            }

            return o.forEach(function (s, l) {
              if (r !== s || o.length === l + 1) return e;
              r = e.placement.split("-")[0], i = v(r);

              var u,
                  c = e.offsets.popper,
                  d = e.offsets.reference,
                  p = B,
                  f = "left" === r && p(c.right) > p(d.left) || "right" === r && p(c.left) < p(d.right) || "top" === r && p(c.bottom) > p(d.top) || "bottom" === r && p(c.top) < p(d.bottom),
                  h = p(c.left) < p(n.left),
                  m = p(c.right) > p(n.right),
                  y = p(c.top) < p(n.top),
                  g = p(c.bottom) > p(n.bottom),
                  w = "left" === r && h || "right" === r && m || "top" === r && y || "bottom" === r && g,
                  b = -1 !== ["top", "bottom"].indexOf(r),
                  _ = !!t.flipVariations && (b && "start" === a && h || b && "end" === a && m || !b && "start" === a && y || !b && "end" === a && g);

              (f || w || _) && (e.flipped = !0, (f || w) && (r = o[l + 1]), _ && (a = "end" === (u = a) ? "start" : "start" === u ? "end" : u), e.placement = r + (a ? "-" + a : ""), e.offsets.popper = W({}, e.offsets.popper, j(e.instance.popper, e.offsets.reference, e.placement)), e = Q(e.instance.modifiers, e, "flip"));
            }), e;
          },
          behavior: "flip",
          padding: 5,
          boundariesElement: "viewport"
        },
        inner: {
          order: 700,
          enabled: !1,
          fn: function fn(e) {
            var t = e.placement,
                n = t.split("-")[0],
                r = e.offsets,
                i = r.popper,
                a = r.reference,
                o = -1 !== ["left", "right"].indexOf(n),
                s = -1 === ["top", "left"].indexOf(n);
            return i[o ? "left" : "top"] = a[n] - (s ? i[o ? "width" : "height"] : 0), e.placement = v(t), e.offsets.popper = d(i), e;
          }
        },
        hide: {
          order: 800,
          enabled: !0,
          fn: function fn(e) {
            if (!E(e.instance.modifiers, "hide", "preventOverflow")) return e;
            var t = e.offsets.reference,
                n = w(e.instance.modifiers, function (e) {
              return "preventOverflow" === e.name;
            }).boundaries;

            if (t.bottom < n.top || t.left > n.right || t.top > n.bottom || t.right < n.left) {
              if (!0 === e.hide) return e;
              e.hide = !0, e.attributes["x-out-of-boundaries"] = "";
            } else {
              if (!1 === e.hide) return e;
              e.hide = !1, e.attributes["x-out-of-boundaries"] = !1;
            }

            return e;
          }
        },
        computeStyle: {
          order: 850,
          enabled: !0,
          fn: function fn(e, t) {
            var n = t.x,
                r = t.y,
                a = e.offsets.popper,
                o = w(e.instance.modifiers, function (e) {
              return "applyStyle" === e.name;
            }).gpuAcceleration;
            void 0 !== o && console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");

            var s,
                l,
                u = void 0 === o ? t.gpuAcceleration : o,
                c = p(i(e.instance.popper)),
                d = {
              position: a.position
            },
                f = {
              left: B(a.left),
              top: B(a.top),
              bottom: B(a.bottom),
              right: B(a.right)
            },
                h = "bottom" === n ? "top" : "bottom",
                m = "right" === r ? "left" : "right",
                y = _("transform");

            if (l = "bottom" == h ? -c.height + f.bottom : f.top, s = "right" == m ? -c.width + f.right : f.left, u && y) d[y] = "translate3d(" + s + "px, " + l + "px, 0)", d[h] = 0, d[m] = 0, d.willChange = "transform";else {
              var g = "bottom" == h ? -1 : 1,
                  v = "right" == m ? -1 : 1;
              d[h] = l * g, d[m] = s * v, d.willChange = h + ", " + m;
            }
            var j = {
              "x-placement": e.placement
            };
            return e.attributes = W({}, j, e.attributes), e.styles = W({}, d, e.styles), e.arrowStyles = W({}, e.offsets.arrow, e.arrowStyles), e;
          },
          gpuAcceleration: !0,
          x: "bottom",
          y: "right"
        },
        applyStyle: {
          order: 900,
          enabled: !0,
          fn: function fn(e) {
            return S(e.instance.popper, e.styles), t = e.instance.popper, n = e.attributes, Object.keys(n).forEach(function (e) {
              !1 === n[e] ? t.removeAttribute(e) : t.setAttribute(e, n[e]);
            }), e.arrowElement && Object.keys(e.arrowStyles).length && S(e.arrowElement, e.arrowStyles), e;
            var t, n;
          },
          onLoad: function onLoad(e, t, n, r, i) {
            var a = y(0, t, e),
                o = m(n.placement, a, t, e, n.modifiers.flip.boundariesElement, n.modifiers.flip.padding);
            return t.setAttribute("x-placement", o), S(t, {
              position: "absolute"
            }), n;
          },
          gpuAcceleration: void 0
        }
      }
    }, Z;
  }, "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : e.Popper = t();
}

Number.prototype.formatMoney = function (e, t, n) {
  var r = this,
      i = (e = isNaN(e = Math.abs(e)) ? 2 : e, t = void 0 == t ? "." : t, n = void 0 == n ? "," : n, r < 0 ? "-" : ""),
      a = String(parseInt(r = Math.abs(Number(r) || 0).toFixed(e))),
      o = (o = a.length) > 3 ? o % 3 : 0;
  return i + (o ? a.substr(0, o) + n : "") + a.substr(o).replace(/(\d{3})(?=\d)/g, "$1" + n) + (e ? t + Math.abs(r - a).toFixed(e).slice(2) : "");
}, function (e) {
  e.fn.countTo = function (t) {
    return t = t || {}, jQuery(this).each(function () {
      var n = jQuery.extend({}, e.fn.countTo.defaults, {
        from: jQuery(this).data("from"),
        to: jQuery(this).data("to"),
        speed: jQuery(this).data("speed"),
        refreshInterval: jQuery(this).data("refresh-interval"),
        decimals: jQuery(this).data("decimals")
      }, t),
          r = Math.ceil(n.speed / n.refreshInterval),
          i = (n.to - n.from) / r,
          a = this,
          o = jQuery(this),
          s = 0,
          l = n.from,
          u = o.data("countTo") || {};

      function c(e) {
        var t = n.formatter.call(a, e, n);
        o.html(t);
      }

      o.data("countTo", u), u.interval && clearInterval(u.interval), u.interval = setInterval(function () {
        s++, c(l += i), "function" == typeof n.onUpdate && n.onUpdate.call(a, l);
        s >= r && (o.removeData("countTo"), clearInterval(u.interval), l = n.to, "function" == typeof n.onComplete && n.onComplete.call(a, l));
      }, n.refreshInterval), c(l);
    });
  }, e.fn.countTo.defaults = {
    from: 0,
    to: 0,
    speed: 1e3,
    refreshInterval: 100,
    decimals: 0,
    formatter: function formatter(e, t) {
      return e.toFixed(t.decimals);
    },
    onUpdate: null,
    onComplete: null
  };
}(jQuery), function (e) {
  e.fn.appear = function (t, n) {
    var r = e.extend({
      data: void 0,
      one: !0,
      accX: 0,
      accY: 0
    }, n);
    return this.each(function () {
      var n = e(this);

      if (n.appeared = !1, t) {
        var i = e(window),
            a = function a() {
          if (n.is(":visible")) {
            var e = i.scrollLeft(),
                t = i.scrollTop(),
                a = n.offset(),
                o = a.left,
                s = a.top,
                l = r.accX,
                u = r.accY,
                c = n.height(),
                d = i.height(),
                p = n.width(),
                f = i.width();
            s + c + u >= t && s <= t + d + u && o + p + l >= e && o <= e + f + l ? n.appeared || n.trigger("appear", r.data) : n.appeared = !1;
          } else n.appeared = !1;
        },
            o = function o() {
          if (n.appeared = !0, r.one) {
            i.unbind("scroll", a);
            var o = e.inArray(a, e.fn.appear.checks);
            o >= 0 && e.fn.appear.checks.splice(o, 1);
          }

          t.apply(this, arguments);
        };

        r.one ? n.one("appear", r.data, o) : n.bind("appear", r.data, o), i.scroll(a), e.fn.appear.checks.push(a), a();
      } else n.trigger("appear", r.data);
    });
  }, e.extend(e.fn.appear, {
    checks: [],
    timeout: null,
    checkAll: function checkAll() {
      var t = e.fn.appear.checks.length;
      if (t > 0) for (; t--;) {
        e.fn.appear.checks[t]();
      }
    },
    run: function run() {
      e.fn.appear.timeout && clearTimeout(e.fn.appear.timeout), e.fn.appear.timeout = setTimeout(e.fn.appear.checkAll, 20);
    }
  }), e.each(["append", "prepend", "after", "before", "attr", "removeAttr", "addClass", "removeClass", "toggleClass", "remove", "css", "show", "hide"], function (t, n) {
    var r = e.fn[n];
    r && (e.fn[n] = function () {
      var t = r.apply(this, arguments);
      return e.fn.appear.run(), t;
    });
  });
}(jQuery), jQuery.fn.parallax = function (e, t, n) {
  function r() {
    var r = jQuery(window).scrollTop();
    i = n ? function (e) {
      return e.outerHeight(!0);
    } : function (e) {
      return e.height();
    }, o.each(function () {
      var n = jQuery(this),
          o = n.offset().top,
          s = i(n);

      if (!(r > o + s || o > r + window.height)) {
        var l = Math.round((a - r) * t);
        n.css("backgroundPosition", e + " " + l + "px");
      }
    });
  }

  var i,
      a,
      o = jQuery(this);
  (arguments.length < 1 || null === e) && (e = "50%"), (arguments.length < 2 || null === t) && (t = .1), (arguments.length < 3 || null === n) && (n = !0), o.each(function () {
    (a = o.offset().top) < window.height && (a = 0);
  }), jQuery(window).bind("scroll", r).resize(r), r();
}, jQuery.easing.jswing = jQuery.easing.swing, jQuery.extend(jQuery.easing, {
  def: "easeOutQuad",
  swing: function swing(e, t, n, r, i) {
    return jQuery.easing[jQuery.easing.def](e, t, n, r, i);
  },
  easeInQuad: function easeInQuad(e, t, n, r, i) {
    return r * (t /= i) * t + n;
  },
  easeOutQuad: function easeOutQuad(e, t, n, r, i) {
    return -r * (t /= i) * (t - 2) + n;
  },
  easeInOutQuad: function easeInOutQuad(e, t, n, r, i) {
    return (t /= i / 2) < 1 ? r / 2 * t * t + n : -r / 2 * (--t * (t - 2) - 1) + n;
  },
  easeInCubic: function easeInCubic(e, t, n, r, i) {
    return r * (t /= i) * t * t + n;
  },
  easeOutCubic: function easeOutCubic(e, t, n, r, i) {
    return r * ((t = t / i - 1) * t * t + 1) + n;
  },
  easeInOutCubic: function easeInOutCubic(e, t, n, r, i) {
    return (t /= i / 2) < 1 ? r / 2 * t * t * t + n : r / 2 * ((t -= 2) * t * t + 2) + n;
  },
  easeInQuart: function easeInQuart(e, t, n, r, i) {
    return r * (t /= i) * t * t * t + n;
  },
  easeOutQuart: function easeOutQuart(e, t, n, r, i) {
    return -r * ((t = t / i - 1) * t * t * t - 1) + n;
  },
  easeInOutQuart: function easeInOutQuart(e, t, n, r, i) {
    return (t /= i / 2) < 1 ? r / 2 * t * t * t * t + n : -r / 2 * ((t -= 2) * t * t * t - 2) + n;
  },
  easeInQuint: function easeInQuint(e, t, n, r, i) {
    return r * (t /= i) * t * t * t * t + n;
  },
  easeOutQuint: function easeOutQuint(e, t, n, r, i) {
    return r * ((t = t / i - 1) * t * t * t * t + 1) + n;
  },
  easeInOutQuint: function easeInOutQuint(e, t, n, r, i) {
    return (t /= i / 2) < 1 ? r / 2 * t * t * t * t * t + n : r / 2 * ((t -= 2) * t * t * t * t + 2) + n;
  },
  easeInSine: function easeInSine(e, t, n, r, i) {
    return -r * Math.cos(t / i * (Math.PI / 2)) + r + n;
  },
  easeOutSine: function easeOutSine(e, t, n, r, i) {
    return r * Math.sin(t / i * (Math.PI / 2)) + n;
  },
  easeInOutSine: function easeInOutSine(e, t, n, r, i) {
    return -r / 2 * (Math.cos(Math.PI * t / i) - 1) + n;
  },
  easeInExpo: function easeInExpo(e, t, n, r, i) {
    return 0 == t ? n : r * Math.pow(2, 10 * (t / i - 1)) + n;
  },
  easeOutExpo: function easeOutExpo(e, t, n, r, i) {
    return t == i ? n + r : r * (1 - Math.pow(2, -10 * t / i)) + n;
  },
  easeInOutExpo: function easeInOutExpo(e, t, n, r, i) {
    return 0 == t ? n : t == i ? n + r : (t /= i / 2) < 1 ? r / 2 * Math.pow(2, 10 * (t - 1)) + n : r / 2 * (2 - Math.pow(2, -10 * --t)) + n;
  },
  easeInCirc: function easeInCirc(e, t, n, r, i) {
    return -r * (Math.sqrt(1 - (t /= i) * t) - 1) + n;
  },
  easeOutCirc: function easeOutCirc(e, t, n, r, i) {
    return r * Math.sqrt(1 - (t = t / i - 1) * t) + n;
  },
  easeInOutCirc: function easeInOutCirc(e, t, n, r, i) {
    return (t /= i / 2) < 1 ? -r / 2 * (Math.sqrt(1 - t * t) - 1) + n : r / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + n;
  },
  easeInElastic: function easeInElastic(e, t, n, r, i) {
    var a = 1.70158,
        o = 0,
        s = r;
    if (0 == t) return n;
    if (1 == (t /= i)) return n + r;

    if (o || (o = .3 * i), s < Math.abs(r)) {
      s = r;
      a = o / 4;
    } else a = o / (2 * Math.PI) * Math.asin(r / s);

    return -s * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * i - a) * (2 * Math.PI) / o) + n;
  },
  easeOutElastic: function easeOutElastic(e, t, n, r, i) {
    var a = 1.70158,
        o = 0,
        s = r;
    if (0 == t) return n;
    if (1 == (t /= i)) return n + r;

    if (o || (o = .3 * i), s < Math.abs(r)) {
      s = r;
      a = o / 4;
    } else a = o / (2 * Math.PI) * Math.asin(r / s);

    return s * Math.pow(2, -10 * t) * Math.sin((t * i - a) * (2 * Math.PI) / o) + r + n;
  },
  easeInOutElastic: function easeInOutElastic(e, t, n, r, i) {
    var a = 1.70158,
        o = 0,
        s = r;
    if (0 == t) return n;
    if (2 == (t /= i / 2)) return n + r;

    if (o || (o = i * (.3 * 1.5)), s < Math.abs(r)) {
      s = r;
      a = o / 4;
    } else a = o / (2 * Math.PI) * Math.asin(r / s);

    return t < 1 ? s * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * i - a) * (2 * Math.PI) / o) * -.5 + n : s * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * i - a) * (2 * Math.PI) / o) * .5 + r + n;
  },
  easeInBack: function easeInBack(e, t, n, r, i, a) {
    return void 0 == a && (a = 1.70158), r * (t /= i) * t * ((a + 1) * t - a) + n;
  },
  easeOutBack: function easeOutBack(e, t, n, r, i, a) {
    return void 0 == a && (a = 1.70158), r * ((t = t / i - 1) * t * ((a + 1) * t + a) + 1) + n;
  },
  easeInOutBack: function easeInOutBack(e, t, n, r, i, a) {
    return void 0 == a && (a = 1.70158), (t /= i / 2) < 1 ? r / 2 * (t * t * ((1 + (a *= 1.525)) * t - a)) + n : r / 2 * ((t -= 2) * t * ((1 + (a *= 1.525)) * t + a) + 2) + n;
  },
  easeInBounce: function easeInBounce(e, t, n, r, i) {
    return r - jQuery.easing.easeOutBounce(e, i - t, 0, r, i) + n;
  },
  easeOutBounce: function easeOutBounce(e, t, n, r, i) {
    return (t /= i) < 1 / 2.75 ? r * (7.5625 * t * t) + n : t < 2 / 2.75 ? r * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + n : t < 2.5 / 2.75 ? r * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + n : r * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + n;
  },
  easeInOutBounce: function easeInOutBounce(e, t, n, r, i) {
    return t < i / 2 ? .5 * jQuery.easing.easeInBounce(e, 2 * t, 0, r, i) + n : .5 * jQuery.easing.easeOutBounce(e, 2 * t - i, 0, r, i) + .5 * r + n;
  }
}), function () {
  var e,
      t,
      n,
      r,
      i,
      a = function a(e, t) {
    return function () {
      return e.apply(t, arguments);
    };
  },
      o = [].indexOf || function (e) {
    for (var t = 0, n = this.length; n > t; t++) {
      if (t in this && this[t] === e) return t;
    }

    return -1;
  };

  t = function () {
    function e() {}

    return e.prototype.extend = function (e, t) {
      var n, r;

      for (n in t) {
        r = t[n], null == e[n] && (e[n] = r);
      }

      return e;
    }, e.prototype.isMobile = function (e) {
      return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(e);
    }, e.prototype.addEvent = function (e, t, n) {
      return null != e.addEventListener ? e.addEventListener(t, n, !1) : null != e.attachEvent ? e.attachEvent("on" + t, n) : e[t] = n;
    }, e.prototype.removeEvent = function (e, t, n) {
      return null != e.removeEventListener ? e.removeEventListener(t, n, !1) : null != e.detachEvent ? e.detachEvent("on" + t, n) : delete e[t];
    }, e.prototype.innerHeight = function () {
      return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight;
    }, e;
  }(), n = this.WeakMap || this.MozWeakMap || (n = function () {
    function e() {
      this.keys = [], this.values = [];
    }

    return e.prototype.get = function (e) {
      var t, n, r, i, a;

      for (t = r = 0, i = (a = this.keys).length; i > r; t = ++r) {
        if (n = a[t], n === e) return this.values[t];
      }
    }, e.prototype.set = function (e, t) {
      var n, r, i, a, o;

      for (n = i = 0, a = (o = this.keys).length; a > i; n = ++i) {
        if (r = o[n], r === e) return void (this.values[n] = t);
      }

      return this.keys.push(e), this.values.push(t);
    }, e;
  }()), e = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (e = function () {
    function e() {
      "undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."), "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.");
    }

    return e.notSupported = !0, e.prototype.observe = function () {}, e;
  }()), r = this.getComputedStyle || function (e) {
    return this.getPropertyValue = function (t) {
      var n;
      return "float" === t && (t = "styleFloat"), i.test(t) && t.replace(i, function (e, t) {
        return t.toUpperCase();
      }), (null != (n = e.currentStyle) ? n[t] : void 0) || null;
    }, this;
  }, i = /(\-([a-z]){1})/g, this.WOW = function () {
    function i(e) {
      null == e && (e = {}), this.scrollCallback = a(this.scrollCallback, this), this.scrollHandler = a(this.scrollHandler, this), this.start = a(this.start, this), this.scrolled = !0, this.config = this.util().extend(e, this.defaults), this.animationNameCache = new n();
    }

    return i.prototype.defaults = {
      boxClass: "wow",
      animateClass: "animated",
      offset: 0,
      mobile: !0,
      live: !0,
      callback: null
    }, i.prototype.init = function () {
      var e;
      return this.element = window.document.documentElement, "interactive" === (e = document.readyState) || "complete" === e ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start), this.finished = [];
    }, i.prototype.start = function () {
      var t, n, r, i, a;
      if (this.stopped = !1, this.boxes = function () {
        var e, n, r, i;

        for (i = [], e = 0, n = (r = this.element.querySelectorAll("." + this.config.boxClass)).length; n > e; e++) {
          t = r[e], i.push(t);
        }

        return i;
      }.call(this), this.all = function () {
        var e, n, r, i;

        for (i = [], e = 0, n = (r = this.boxes).length; n > e; e++) {
          t = r[e], i.push(t);
        }

        return i;
      }.call(this), this.boxes.length) if (this.disabled()) this.resetStyle();else for (i = this.boxes, n = 0, r = i.length; r > n; n++) {
        t = i[n], this.applyStyle(t, !0);
      }
      return this.disabled() || (this.util().addEvent(window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live ? new e((a = this, function (e) {
        var t, n, r, i, o;

        for (o = [], r = 0, i = e.length; i > r; r++) {
          n = e[r], o.push(function () {
            var e, r, i, a;

            for (a = [], e = 0, r = (i = n.addedNodes || []).length; r > e; e++) {
              t = i[e], a.push(this.doSync(t));
            }

            return a;
          }.call(a));
        }

        return o;
      })).observe(document.body, {
        childList: !0,
        subtree: !0
      }) : void 0;
    }, i.prototype.stop = function () {
      return this.stopped = !0, this.util().removeEvent(window, "scroll", this.scrollHandler), this.util().removeEvent(window, "resize", this.scrollHandler), null != this.interval ? clearInterval(this.interval) : void 0;
    }, i.prototype.sync = function () {
      return e.notSupported ? this.doSync(this.element) : void 0;
    }, i.prototype.doSync = function (e) {
      var t, n, r, i, a;

      if (null == e && (e = this.element), 1 === e.nodeType) {
        for (a = [], n = 0, r = (i = (e = e.parentNode || e).querySelectorAll("." + this.config.boxClass)).length; r > n; n++) {
          t = i[n], o.call(this.all, t) < 0 ? (this.boxes.push(t), this.all.push(t), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(t, !0), a.push(this.scrolled = !0)) : a.push(void 0);
        }

        return a;
      }
    }, i.prototype.show = function (e) {
      return this.applyStyle(e), e.className = e.className + " " + this.config.animateClass, null != this.config.callback ? this.config.callback(e) : void 0;
    }, i.prototype.applyStyle = function (e, t) {
      var n, r, i, a;
      return r = e.getAttribute("data-wow-duration"), n = e.getAttribute("data-wow-delay"), i = e.getAttribute("data-wow-iteration"), this.animate((a = this, function () {
        return a.customStyle(e, t, r, n, i);
      }));
    }, i.prototype.animate = "requestAnimationFrame" in window ? function (e) {
      return window.requestAnimationFrame(e);
    } : function (e) {
      return e();
    }, i.prototype.resetStyle = function () {
      var e, t, n, r, i;

      for (i = [], t = 0, n = (r = this.boxes).length; n > t; t++) {
        e = r[t], i.push(e.style.visibility = "visible");
      }

      return i;
    }, i.prototype.customStyle = function (e, t, n, r, i) {
      return t && this.cacheAnimationName(e), e.style.visibility = t ? "hidden" : "visible", n && this.vendorSet(e.style, {
        animationDuration: n
      }), r && this.vendorSet(e.style, {
        animationDelay: r
      }), i && this.vendorSet(e.style, {
        animationIterationCount: i
      }), this.vendorSet(e.style, {
        animationName: t ? "none" : this.cachedAnimationName(e)
      }), e;
    }, i.prototype.vendors = ["moz", "webkit"], i.prototype.vendorSet = function (e, t) {
      var n, r, i, a;
      a = [];

      for (n in t) {
        r = t[n], e["" + n] = r, a.push(function () {
          var t, a, o, s;

          for (s = [], t = 0, a = (o = this.vendors).length; a > t; t++) {
            i = o[t], s.push(e["" + i + n.charAt(0).toUpperCase() + n.substr(1)] = r);
          }

          return s;
        }.call(this));
      }

      return a;
    }, i.prototype.vendorCSS = function (e, t) {
      var n, i, a, o, s, l;

      for (n = (i = r(e)).getPropertyCSSValue(t), o = 0, s = (l = this.vendors).length; s > o; o++) {
        a = l[o], n = n || i.getPropertyCSSValue("-" + a + "-" + t);
      }

      return n;
    }, i.prototype.animationName = function (e) {
      var t;

      try {
        t = this.vendorCSS(e, "animation-name").cssText;
      } catch (n) {
        t = r(e).getPropertyValue("animation-name");
      }

      return "none" === t ? "" : t;
    }, i.prototype.cacheAnimationName = function (e) {
      return this.animationNameCache.set(e, this.animationName(e));
    }, i.prototype.cachedAnimationName = function (e) {
      return this.animationNameCache.get(e);
    }, i.prototype.scrollHandler = function () {
      return this.scrolled = !0;
    }, i.prototype.scrollCallback = function () {
      var e;
      return !this.scrolled || (this.scrolled = !1, this.boxes = function () {
        var t, n, r, i;

        for (i = [], t = 0, n = (r = this.boxes).length; n > t; t++) {
          e = r[t], e && (this.isVisible(e) ? this.show(e) : i.push(e));
        }

        return i;
      }.call(this), this.boxes.length || this.config.live) ? void 0 : this.stop();
    }, i.prototype.offsetTop = function (e) {
      for (var t; void 0 === e.offsetTop;) {
        e = e.parentNode;
      }

      for (t = e.offsetTop; e = e.offsetParent;) {
        t += e.offsetTop;
      }

      return t;
    }, i.prototype.isVisible = function (e) {
      var t, n, r, i, a;
      return n = e.getAttribute("data-wow-offset") || this.config.offset, i = (a = window.pageYOffset) + Math.min(this.element.clientHeight, this.util().innerHeight()) - n, t = (r = this.offsetTop(e)) + e.clientHeight, i >= r && t >= a;
    }, i.prototype.util = function () {
      return null != this._util ? this._util : this._util = new t();
    }, i.prototype.disabled = function () {
      return !this.config.mobile && this.util().isMobile(navigator.userAgent);
    }, i;
  }();
}.call(this), function (e, t, n) {
  function r(e, t) {
    return _typeof(e) === t;
  }

  function i(e) {
    var t = j.className,
        n = g._config.classPrefix || "";

    if (w && (t = t.baseVal), g._config.enableJSClass) {
      var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
      t = t.replace(r, "$1" + n + "js$2");
    }

    g._config.enableClasses && (t += " " + n + e.join(" " + n), w ? j.className.baseVal = t : j.className = t);
  }

  function a() {
    return "function" != typeof t.createElement ? t.createElement(arguments[0]) : w ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments);
  }

  function o(e, t) {
    if ("object" == _typeof(e)) for (var n in e) {
      _(e, n) && o(n, e[n]);
    } else {
      var r = (e = e.toLowerCase()).split("."),
          a = g[r[0]];
      if (2 == r.length && (a = a[r[1]]), void 0 !== a) return g;
      t = "function" == typeof t ? t() : t, 1 == r.length ? g[r[0]] = t : (!g[r[0]] || g[r[0]] instanceof Boolean || (g[r[0]] = new Boolean(g[r[0]])), g[r[0]][r[1]] = t), i([(t && 0 != t ? "" : "no-") + r.join("-")]), g._trigger(e, t);
    }
    return g;
  }

  function s(e) {
    return e.replace(/([a-z])-([a-z])/g, function (e, t, n) {
      return t + n.toUpperCase();
    }).replace(/^-/, "");
  }

  function l(e, n, r, i) {
    var o,
        s,
        l,
        u,
        c,
        d = "modernizr",
        p = a("div"),
        f = ((c = t.body) || ((c = a(w ? "svg" : "body")).fake = !0), c);
    if (parseInt(r, 10)) for (; r--;) {
      l = a("div"), l.id = i ? i[r] : d + (r + 1), p.appendChild(l);
    }
    return (o = a("style")).type = "text/css", o.id = "s" + d, (f.fake ? f : p).appendChild(o), f.appendChild(p), o.styleSheet ? o.styleSheet.cssText = e : o.appendChild(t.createTextNode(e)), p.id = d, f.fake && (f.style.background = "", f.style.overflow = "hidden", u = j.style.overflow, j.style.overflow = "hidden", j.appendChild(f)), s = n(p, e), f.fake ? (f.parentNode.removeChild(f), j.style.overflow = u, j.offsetHeight) : p.parentNode.removeChild(p), !!s;
  }

  function u(e, t) {
    return function () {
      return e.apply(t, arguments);
    };
  }

  function c(e) {
    return e.replace(/([A-Z])/g, function (e, t) {
      return "-" + t.toLowerCase();
    }).replace(/^ms-/, "-ms-");
  }

  function d(t, i, o, u) {
    function d() {
      f && (delete O.style, delete O.modElem);
    }

    if (u = !r(u, "undefined") && u, !r(o, "undefined")) {
      var p = function (t, r) {
        var i = t.length;

        if ("CSS" in e && "supports" in e.CSS) {
          for (; i--;) {
            if (e.CSS.supports(c(t[i]), r)) return !0;
          }

          return !1;
        }

        if ("CSSSupportsRule" in e) {
          for (var a = []; i--;) {
            a.push("(" + c(t[i]) + ":" + r + ")");
          }

          return l("@supports (" + (a = a.join(" or ")) + ") { #modernizr { position: absolute; } }", function (e) {
            return "absolute" == getComputedStyle(e, null).position;
          });
        }

        return n;
      }(t, o);

      if (!r(p, "undefined")) return p;
    }

    for (var f, h, m, y, g, v = ["modernizr", "tspan", "samp"]; !O.style && v.length;) {
      f = !0, O.modElem = a(v.shift()), O.style = O.modElem.style;
    }

    for (m = t.length, h = 0; m > h; h++) {
      if (y = t[h], g = O.style[y], j = y, w = "-", !!~("" + j).indexOf(w) && (y = s(y)), O.style[y] !== n) {
        if (u || r(o, "undefined")) return d(), "pfx" != i || y;

        try {
          O.style[y] = o;
        } catch (e) {}

        if (O.style[y] != g) return d(), "pfx" != i || y;
      }
    }

    var j, w;
    return d(), !1;
  }

  function p(e, t, n, i, a) {
    var o = e.charAt(0).toUpperCase() + e.slice(1),
        s = (e + " " + S.join(o + " ") + o).split(" ");
    return r(t, "string") || r(t, "undefined") ? d(s, t, i, a) : function (e, t, n) {
      var i;

      for (var a in e) {
        if (e[a] in t) return !1 === n ? e[a] : (i = t[e[a]], r(i, "function") ? u(i, n || t) : i);
      }

      return !1;
    }(s = (e + " " + b.join(o + " ") + o).split(" "), t, n);
  }

  function f(e, t, r) {
    return p(e, n, n, t, r);
  }

  var h = [],
      m = [],
      y = {
    _version: "3.3.1",
    _config: {
      classPrefix: "",
      enableClasses: !0,
      enableJSClass: !0,
      usePrefixes: !0
    },
    _q: [],
    on: function on(e, t) {
      var n = this;
      setTimeout(function () {
        t(n[e]);
      }, 0);
    },
    addTest: function addTest(e, t, n) {
      m.push({
        name: e,
        fn: t,
        options: n
      });
    },
    addAsyncTest: function addAsyncTest(e) {
      m.push({
        name: null,
        fn: e
      });
    }
  },
      g = function g() {};

  g.prototype = y, g = new g();
  var v = y._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];
  y._prefixes = v;
  var j = t.documentElement,
      w = "svg" === j.nodeName.toLowerCase();
  w || function (e, t) {
    function n() {
      var e = h.elements;
      return "string" == typeof e ? e.split(" ") : e;
    }

    function r(e) {
      var t = f[e[d]];
      return t || (t = {}, p++, e[d] = p, f[p] = t), t;
    }

    function i(e, n, i) {
      return n || (n = t), s ? n.createElement(e) : (i || (i = r(n)), !(a = i.cache[e] ? i.cache[e].cloneNode() : c.test(e) ? (i.cache[e] = i.createElem(e)).cloneNode() : i.createElem(e)).canHaveChildren || u.test(e) || a.tagUrn ? a : i.frag.appendChild(a));
      var a;
    }

    function a(e) {
      e || (e = t);
      var a,
          l,
          u,
          c,
          d,
          p,
          f = r(e);
      return !h.shivCSS || o || f.hasCSS || (f.hasCSS = (c = "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}", d = (u = e).createElement("p"), p = u.getElementsByTagName("head")[0] || u.documentElement, d.innerHTML = "x<style>" + c + "</style>", !!p.insertBefore(d.lastChild, p.firstChild))), s || (a = e, (l = f).cache || (l.cache = {}, l.createElem = a.createElement, l.createFrag = a.createDocumentFragment, l.frag = l.createFrag()), a.createElement = function (e) {
        return h.shivMethods ? i(e, a, l) : l.createElem(e);
      }, a.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + n().join().replace(/[\w\-:]+/g, function (e) {
        return l.createElem(e), l.frag.createElement(e), 'c("' + e + '")';
      }) + ");return n}")(h, l.frag)), e;
    }

    var o,
        s,
        l = e.html5 || {},
        u = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
        c = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
        d = "_html5shiv",
        p = 0,
        f = {};
    !function () {
      try {
        var e = t.createElement("a");
        e.innerHTML = "<xyz></xyz>", o = "hidden" in e, s = 1 == e.childNodes.length || function () {
          t.createElement("a");
          var e = t.createDocumentFragment();
          return void 0 === e.cloneNode || void 0 === e.createDocumentFragment || void 0 === e.createElement;
        }();
      } catch (e) {
        o = !0, s = !0;
      }
    }();
    var h = {
      elements: l.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
      version: "3.7.3",
      shivCSS: !1 !== l.shivCSS,
      supportsUnknownElements: s,
      shivMethods: !1 !== l.shivMethods,
      type: "default",
      shivDocument: a,
      createElement: i,
      createDocumentFragment: function createDocumentFragment(e, i) {
        if (e || (e = t), s) return e.createDocumentFragment();

        for (var a = (i = i || r(e)).frag.cloneNode(), o = 0, l = n(), u = l.length; u > o; o++) {
          a.createElement(l[o]);
        }

        return a;
      },
      addElements: function addElements(e, t) {
        var n = h.elements;
        "string" != typeof n && (n = n.join(" ")), "string" != typeof e && (e = e.join(" ")), h.elements = n + " " + e, a(t);
      }
    };
    e.html5 = h, a(t), "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && module.exports && (module.exports = h);
  }(void 0 !== e ? e : this, t);
  var Q = "Moz O ms Webkit",
      b = y._config.usePrefixes ? Q.toLowerCase().split(" ") : [];
  y._domPrefixes = b;

  var _,
      C,
      A = function () {
    var e = !("onblur" in t.documentElement);
    return function (t, r) {
      var i;
      return !!t && (r && "string" != typeof r || (r = a(r || "div")), !(i = (t = "on" + t) in r) && e && (r.setAttribute || (r = a("div")), r.setAttribute(t, ""), i = "function" == typeof r[t], r[t] !== n && (r[t] = n), r.removeAttribute(t)), i);
    };
  }();

  y.hasEvent = A, g.addTest("video", function () {
    var e = a("video"),
        t = !1;

    try {
      (t = !!e.canPlayType) && ((t = new Boolean(t)).ogg = e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/, ""), t.h264 = e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/, ""), t.webm = e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/, ""), t.vp9 = e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/, ""), t.hls = e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/, ""));
    } catch (e) {}

    return t;
  }), _ = r(C = {}.hasOwnProperty, "undefined") || r(C.call, "undefined") ? function (e, t) {
    return t in e && r(e.constructor.prototype[t], "undefined");
  } : function (e, t) {
    return C.call(e, t);
  }, y._l = {}, y.on = function (e, t) {
    this._l[e] || (this._l[e] = []), this._l[e].push(t), g.hasOwnProperty(e) && setTimeout(function () {
      g._trigger(e, g[e]);
    }, 0);
  }, y._trigger = function (e, t) {
    if (this._l[e]) {
      var n = this._l[e];
      setTimeout(function () {
        var e;

        for (e = 0; e < n.length; e++) {
          (0, n[e])(t);
        }
      }, 0), delete this._l[e];
    }
  }, g._q.push(function () {
    y.addTest = o;
  });
  var k = "CSS" in e && "supports" in e.CSS,
      x = "supportsCSS" in e;
  g.addTest("supports", k || x);
  var S = y._config.usePrefixes ? Q.split(" ") : [];
  y._cssomPrefixes = S;

  var E = function E(t) {
    var r,
        i = v.length,
        a = e.CSSRule;
    if (void 0 === a) return n;
    if (!t) return !1;
    if ((r = (t = t.replace(/^@/, "")).replace(/-/g, "_").toUpperCase() + "_RULE") in a) return "@" + t;

    for (var o = 0; i > o; o++) {
      var s = v[o];
      if (s.toUpperCase() + "_" + r in a) return "@-" + s.toLowerCase() + "-" + t;
    }

    return !1;
  };

  y.atRule = E;
  var I = y.testStyles = l,
      T = {
    elem: a("modernizr")
  };

  g._q.push(function () {
    delete T.elem;
  });

  var O = {
    style: T.elem.style
  };
  g._q.unshift(function () {
    delete O.style;
  }), y.testProp = function (e, t, r) {
    return d([e], n, t, r);
  }, y.testAllProps = p, y.prefixed = function (e, t, n) {
    return 0 === e.indexOf("@") ? E(e) : (-1 != e.indexOf("-") && (e = s(e)), t ? p(e, t, n) : p(e, "pfx"));
  }, y.testAllProps = f, g.addTest("csstransitions", f("transition", "all", !0)), g.addTest("csstransforms3d", function () {
    var e = !!f("perspective", "1px", !0),
        t = g._config.usePrefixes;

    if (e && (!t || "webkitPerspective" in j.style)) {
      var n;
      g.supports ? n = "@supports (perspective: 1px)" : (n = "@media (transform-3d)", t && (n += ",(-webkit-transform-3d)")), I("#modernizr{width:0;height:0}" + (n += "{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}"), function (t) {
        e = 7 === t.offsetWidth && 18 === t.offsetHeight;
      });
    }

    return e;
  }), function () {
    var e, t, n, i, a, o, s;

    for (var l in m) {
      if (m.hasOwnProperty(l)) {
        if (e = [], (t = m[l]).name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length)) for (n = 0; n < t.options.aliases.length; n++) {
          e.push(t.options.aliases[n].toLowerCase());
        }

        for (i = r(t.fn, "function") ? t.fn() : t.fn, a = 0; a < e.length; a++) {
          o = e[a], s = o.split("."), 1 === s.length ? g[s[0]] = i : (!g[s[0]] || g[s[0]] instanceof Boolean || (g[s[0]] = new Boolean(g[s[0]])), g[s[0]][s[1]] = i), h.push((i ? "" : "no-") + s.join("-"));
        }
      }
    }
  }(), i(h), delete y.addTest, delete y.addAsyncTest;

  for (var B = 0; B < g._q.length; B++) {
    g._q[B]();
  }

  e.Modernizr = g;
}(window, document);
