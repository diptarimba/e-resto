const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"home.index":{"uri":"\/","methods":["GET","HEAD"]},"category.expand":{"uri":"category\/{categoryId}","methods":["GET","HEAD"]},"product.detail":{"uri":"product\/{productId}","methods":["GET","HEAD"]},"home.wishlist":{"uri":"wishlist","methods":["GET","HEAD"]},"home.cart":{"uri":"cart","methods":["GET","HEAD"]},"home.order":{"uri":"order","methods":["GET","HEAD"]},"post.order":{"uri":"order","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
