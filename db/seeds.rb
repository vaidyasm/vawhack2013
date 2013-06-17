# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rake db:seed (or created alongside the db with db:setup).
#
# Examples:
#
#   cities = City.create([{ name: 'Chicago' }, { name: 'Copenhagen' }])
#   Mayor.create(name: 'Emanuel', city: cities.first)

User.create(:email => "admin@yvos.com",
            :name => "admin",
            :password => "password",
            :password_confirmation => "password"
            )

Category.create(parent: 1,
                title:"Domestic violence",
                description:"Domestic violence")
Category.create(parent: 2,
                title:"Social violence",
                description:"Social violence")
Category.create(parent: 3,
                title:"Rape",
                description:"Rape")
Category.create(parent: 4,
                title:"Attempt to Rape",
                description:"Attempt to Rape")
Category.create(parent: 5,
                title: "Murder",
                description:"Murder")
Category.create(parent: 6,
                title: "Attempt to Murder",
                description: "Attempt to Murder")
Category.create(parent: 7,
                title: "Trafficking",
                description:"Trafficking")
Category.create(parent: 8,
                title: "Sexual Abuse",
                description: "Sexual Abuse")
Category.create(parent: 9,
                title: "Other",
                description: "Other")
Category.create(parent: 1,
                title: "Polygamy",
                description: "Polygamy")
Category.create(parent: 1,
                title: "Physical Abuse",
                description: "Physical Abuse")
Category.create(parent: 1,
                title: "Marital Rape",
                description: "Marital Rape")
Category.create(parent: 1,
                title: "Threats", 
                description: "Threats")