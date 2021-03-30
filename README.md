Product

    hasMany -> Category ( can belong to multiple categories at once )

Category

    hasMany -> Category ( parent )
    hasMany -> Category ( child )

    hasmany -> Product ( products that belong to that specific category )