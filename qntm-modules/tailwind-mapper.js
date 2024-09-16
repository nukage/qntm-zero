
 


const spacingMapper = (spacing) => {
    let result = {};

    fontSizes.forEach(function(spacing) {
        result[''+spacing.slug+''] = spacing.size;
    });

    return result;
}
module.exports = {spacingMapper};
