const Ziggy = {"url":"http:\/\/vue-frontend-mysitio.test","port":null,"defaults":{},"routes":{"homepage":{"uri":"posts","methods":["GET","HEAD"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
