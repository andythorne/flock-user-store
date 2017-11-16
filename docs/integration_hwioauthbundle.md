# Integrating Flock into HWIOAuthBundle

[HWIOAuthBundle](https://github.com/hwi/HWIOAuthBundle) is an OAuth client for your app to auth and request a token from
any OAuth server.

This guild shows you how to set up HWIOAuthBundle to work with Flock.

## 1. Installation
Follow https://github.com/hwi/HWIOAuthBundle/blob/master/Resources/doc/1-setting_up_the_bundle.md to install and setup 
HWIOAuthBundle.

## 2. Configure Flock
In your app's application config:

```yaml
hwi_oauth:
    firewall_names: [main]
    use_referer: true
    resource_owners:
        flock:
            type:                oauth2
            client_id:           <your flock public id>
            client_secret:       <your flock secret>
            access_token_url:    <your flock domain>/oauth/v2/token
            authorization_url:   <your flock domain>/oauth/v2/auth
            infos_url:           <your flock domain>/api/user
            user_response_class: HWI\Bundle\OAuthBundle\OAuth\Response\PathUserResponse
            paths:
                identifier: id
                nickname:   username
                realname:   fullname
                email:      email
                
    # If you're using FOSUserBundle in your app
    fosub:
        properties:
            flock:    id

```

## 3. Configure your firewall
Finally, add your flock resource owner to your oauth firewall config

```yaml
security:
    # ...
    
    firewalls:
        main:
            oauth:
                resource_owners:
                    flock:         /login/check-flock
```

## 4. Setup FOSUserBundle (optional)

If you use [FOSUser](https://github.com/FriendsOfSymfony/FOSUserBundle) in your app, see 
https://github.com/hwi/HWIOAuthBundle/blob/master/Resources/doc/4-integrating_fosub.md to set up your user provider
